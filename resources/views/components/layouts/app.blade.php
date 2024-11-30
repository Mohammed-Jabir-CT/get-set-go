<x-layouts.skeleton :title="$title" :description="$description">
    <header>
        <x-navbar/>
    </header>
    <main class="px-6 py-4">
        {{$slot}}
    </main>
</x-layouts.skeleton>