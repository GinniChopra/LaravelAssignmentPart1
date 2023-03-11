<x-layout>
    <x-slot name="content">

        {{-- <div>
            <a href="/projects/">
                <-- Back to Projects</a>
        </div> --}}
       
        <div class="relative flex flex-col justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="mt-6">

                @if (isset($category))
                <div class="flex grow-0 h-14">
        
                        <h1 class="text-slate-500 hover:text-blue-600">{{ $category->name }} Projects</h1>
                    </div>

                @elseif(isset($tag)) 

                <div class="flex grow-0 h-14">
        
                    <h1 class="text-slate-500 hover:text-blue-600">{{ $tag}} Projects</h1>
                </div>

                @endif


                <section class="grid grid-cols-2 md:grid-cols-2 gap-2">
                    @foreach ($projects as $project)
                        <x-projects.project-card :project="$project" />
                    @endforeach
                </section>
                {{-- @if (count($projects))
                    <div class="text-xs w-full text-right">{{ count($projects) }} projects to peep.</div>
                @else
                    <div>Nothing to showcase, yet.</div>
                @endif --}}


                @if (count($projects))
                <div class="text-xs mt-4 w-full text-right">
                    @if($projects instanceof \Illuminate\Pagination\AbstractPaginator)
                        {{ $projects->links() }}
                    @else
                        {{-- Found {{ count($projects) }} Projects in {{ $category->name }} --}}
                        Found {{ count($projects) }} Projects
                    @endif
                </div>
            @else
                <div>Nothing to showcase, yet.</div>
            @endif
            </div>
        </div>
    </x-slot>
</x-layout>
