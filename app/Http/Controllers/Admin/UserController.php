<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display list of all users
     */
    public function index(Request $request)
    {
        $query = User::orderBy('created_at', 'desc');

        // Filter by status
        if ($request->has('status')) {
            if ($request->status === 'pending') {
                $query->where('is_admin', false);
            } elseif ($request->status === 'approved') {
                $query->where('is_admin', true);
            }
        }

        // Search
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->paginate(20)->withQueryString();

        // Stats
        $totalUsers = User::count();
        $pendingUsers = User::where('is_admin', false)->count();
        $approvedUsers = User::where('is_admin', true)->count();

        return view('admin.users.index', compact('users', 'totalUsers', 'pendingUsers', 'approvedUsers'));
    }

    /**
     * Approve user (set is_admin to true)
     */
    public function approve(User $user)
    {
        $user->update(['is_admin' => true]);

        return redirect()->route('admin.users.index')
            ->with('success', "User '{$user->name}' berhasil disetujui sebagai admin.");
    }

    /**
     * Revoke admin access (set is_admin to false)
     */
    public function revoke(User $user)
    {
        // Prevent revoking own admin access
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Anda tidak dapat mencabut akses admin Anda sendiri.');
        }

        $user->update(['is_admin' => false]);

        return redirect()->route('admin.users.index')
            ->with('success', "Akses admin user '{$user->name}' berhasil dicabut.");
    }

    /**
     * Delete user
     */
    public function destroy(User $user)
    {
        // Prevent deleting own account
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $userName = $user->name;
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', "User '{$userName}' berhasil dihapus.");
    }
}
