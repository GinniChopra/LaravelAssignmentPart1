<x-layout>
    <x-slot name="content">
        <div>
            <a href="/projects/">
                <-- Back to Projects</a>
        </div>

        <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


            <h2>{{ $project['title'] }}</h2>

        </div>
    </x-slot>
</x-layout>
