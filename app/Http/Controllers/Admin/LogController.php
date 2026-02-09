<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of activity logs.
     */
    public function index(Request $request)
    {
        $query = ActivityLog::with('user')->latest();

        // Search by user name or product name
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('model_name', 'like', "%{$search}%")
                  ->orWhereHas('user', function($qu) use ($search) {
                      $qu->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by action
        if ($action = $request->input('action')) {
            $query->where('action', $action);
        }

        $logs = $query->paginate(25)->withQueryString();

        return view('admin.logs.index', compact('logs'));
    }

    /**
     * Display a specific log entry if needed
     */
    public function show(ActivityLog $log)
    {
        $log->load('user');
        return view('admin.logs.show', compact('log'));
    }
}
