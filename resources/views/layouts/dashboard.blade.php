<x-mkt-layouts.base>
    <div class="min-h-screen bg-gray-100">
        {{ $header }}

        <!-- Page Content -->
        <main>
            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    @stack('modals')
</x-mkt-layouts.base>
