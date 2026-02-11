<x-app-layout>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <dt class="truncate text-sm font-medium text-neutral-500 dark:text-neutral-400">Total Orders</dt>
                <dd class="mt-2 text-3xl font-semibold text-neutral-900 dark:text-white">0</dd>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <dt class="truncate text-sm font-medium text-neutral-500 dark:text-neutral-400">Pending Requests</dt>
                <dd class="mt-2 text-3xl font-semibold text-neutral-900 dark:text-white">0</dd>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <dt class="truncate text-sm font-medium text-neutral-500 dark:text-neutral-400">Account Status</dt>
                <dd class="mt-2 text-3xl font-semibold text-neutral-900 dark:text-white">{{ auth()->user()->status }}</dd>
            </div>
        </div>
        
        <div class="relative h-full flex-1 rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="text-lg font-medium text-neutral-900 dark:text-white">Welcome, {{ auth()->user()->name }}!</h3>
            <p class="mt-2 text-neutral-500 dark:text-neutral-400">
                This contains your user dashboard. You have limited access compared to administrators.
            </p>
            <div class="mt-6">
                <!-- Placeholder for user-specific content -->
                 <div class="rounded-lg border border-dashed border-neutral-300 p-12 text-center dark:border-neutral-600">
                    <svg class="mx-auto h-12 w-12 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-semibold text-neutral-900 dark:text-white">No items</h3>
                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Get started by creating a new request.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
