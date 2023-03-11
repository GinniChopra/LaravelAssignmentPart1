<x-layout>
    <x-slot name="content">
        
        <div
            class="relative flex  flex-col items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
           
            {{-- <div class="flex "> --}}
        <div>
            <img src="storage/images/featuredProject.jpg" alt="Upcoming Project" width="900px;"> 
            
         </div><br><br>
         <div>
         <section class="grid grid-cols-2 md:grid-cols-2 gap-2">
            @foreach ($projects as $project)
                <x-projects.project-card :project="$project" />
            @endforeach
        </section>
    </div>
        <br>
        <div>
                   <a href="/projects" class=" mr-4 text-s font-bold" style="background-color: aqua;">View Projects</a>
                   
        </div>       

        </div>
    {{-- </div> --}}
    </x-slot>
</x-layout>
