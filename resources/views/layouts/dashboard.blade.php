<div class="min-h-screen bg-gray-100">
    {{ $header }}

    <!-- Page Content -->
    <main>
        <div>
            <div class="max-w-5xl mx-auto py-10 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </div>
    </main>
</div>

@stack('modals')
