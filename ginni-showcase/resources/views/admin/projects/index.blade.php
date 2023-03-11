<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col items-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
            <h1 class=" mt-10 first-letter:text-xl font-bold">ADMIN</h1>
            <div class="mt-6 w-8/12">
                <div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg">
                    <h2>Projects</h2>
                    <div class="flex justify-end">
                        <a href="/admin/projects/create" class="p-1 bg-lime-500 text-white sm:rounded-lg">Create Project</a>
                    </div>
                    <div class="mt-5 [&>*:nth-child(odd)]:bg-gray-100 [&>*:nth-child(even)]:bg-white">
                        @foreach ($projects as $project)
                            <div class="flex justify-between">
                                <div>
                                    <a href="/projects/{{$project->id}}">{{ $project->title }}</a>
                                </div>
                                <span>
                                    <a href="/admin/projects/{{ $project->id }}/edit">Edit <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                            class="w-6 h-6 inline">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>

                                    
                                    <form method="POST" action="/admin/projects/{{$project->id}}/delete" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-600">Delete
                                        </button>
                                    </form>
                        
                        
                                        
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1" stroke="currentColor" class="w-6 h-6 inline text-red-600 ">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mt-6 w-8/12">
                <div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg">
                    <h2>Users</h2>
                    <div class="flex justify-end">
                        <a href="/admin/users/create" class="p-1 bg-lime-500 text-white sm:rounded-lg">Create User</a>
                    </div>
                    <div class="mt-5 [&>*:nth-child(odd)]:bg-gray-100 [&>*:nth-child(even)]:bg-white">
                        @foreach ($users as $user)
                            <div class="flex justify-between">
                                <div>
                                    {{ $user->name }}
                                </div>
                                <span>
                                    <a href="/admin/users/{{ $user->id }}/edit">Edit <svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1" stroke="currentColor" class="w-6 h-6 inline">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="/admin/users/{{ $user->id }}/delete" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-600">Delete
                                        </button>
                                    </form>
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1" stroke="currentColor" class="w-6 h-6 inline text-red-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>



            <div class="mt-6 w-8/12">
                <div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg">
                    <h2>Tags</h2>
                    <div class="flex justify-end">
                        <a href="/admin/tags/create" class="p-1 bg-lime-500 text-white sm:rounded-lg">Create Tag</a>
                    </div>
                    <div class="mt-5 [&>*:nth-child(odd)]:bg-gray-100 [&>*:nth-child(even)]:bg-white">
                        @foreach ($tags as $tag)
                            <div class="flex justify-between">
                                <div>
                                    {{ $tag->name }}
                                </div>
                                <span>
                                    <a href="/admin/tags/{{ $tag->id }}/edit">Edit <svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1" stroke="currentColor" class="w-6 h-6 inline">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="/admin/tags/{{ $tag->id }}/delete" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-600">Delete
                                        </button>
                                    </form>
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1" stroke="currentColor" class="w-6 h-6 inline text-red-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            


            <div class="mt-6 w-8/12">
                <div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg">
                    <h2>Categories</h2>
                    <div class="flex justify-end">
                        <a href="/admin/categories/create" class="p-1 bg-lime-500 text-white sm:rounded-lg">Create Category</a>
                    </div>
                    <div class="mt-5 [&>*:nth-child(odd)]:bg-gray-100 [&>*:nth-child(even)]:bg-white">
                        @foreach ($categories as $category)
                            <div class="flex justify-between">
                                <div>
                                    {{ $category->name }}
                                </div>
                                <span>
                                    <a href="/admin/categories/{{ $category->id }}/edit">Edit <svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1" stroke="currentColor" class="w-6 h-6 inline">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    

                                        <form method="POST" action="/admin/categories/{{ $category->id }}/delete" class="inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-red-600">Delete
                                            </button>
                                        </form>
                                        
                                        
                                        
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1" stroke="currentColor" class="w-6 h-6 inline text-red-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>




        </div>
    </x-slot>
</x-layout>