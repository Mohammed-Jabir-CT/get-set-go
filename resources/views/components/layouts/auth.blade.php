<x-layouts.skeleton :title="$title" :description="$description">
    <div class="h-screen flex flex-col items-center justify-center">
        <x-app-logo/>
        <main class="w-fit p-6 rounded-box shadow-lg">
            {{ $slot }}
        </main>
    </div>
</x-layouts.skeleton>
