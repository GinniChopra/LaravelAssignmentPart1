<header class="px-6 py-4 w-full h-fit">
    <nav class="flex justify-between items-end">
        <div>
            <a href="/" class="mr-4 text-s font-bold uppercase">Home</a>
            <a href="/projects" class=" mr-4 text-s font-bold uppercase">Projects</a>
            <a href="/about" class="mr-4 text-s font-bold uppercase">About</a>
        </div>



        <div class="mt-8 md:mt-0">
            @auth
            <span class="text-s font-bold uppercase"> {{ auth()->user()->name }} </span>
            @if (auth()->user()->isAdmin())
            <a href="/admin/projects" class="ml-4 text-s font-bold uppercase">Admin</a>
          @endif
            <a href="/logout" class="ml-4 text-s font-bold uppercase">Logout</a>
        @else
            <a href="/login" class="ml-4 text-s font-bold uppercase">Log In</a>
            {{-- <a href="/register" class="ml-4 text-s font-bold uppercase">Register</a> --}}
        @endauth

        </div>

    </nav>


</header>
