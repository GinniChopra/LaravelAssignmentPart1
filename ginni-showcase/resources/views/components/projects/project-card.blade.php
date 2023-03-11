@props(['project', 'showBody' => false])

<div class="p-6 bg-white overflow-hidden shadow sm:rounded-lg flex flex-col items-center justify-center max-w-md ">
    <div class="text-xl font-bold mb-5">
        <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
    </div>

    @if ($showBody)
        <div class="grid grid-cols-1 gap-3">
            @if ($project->image)
                <img src="{{ url('storage/' . $project->image) }}" alt="placeholder Image" />
            @else
                <img src="{{ url('storage/images/placeholder1.png') }}" />
            @endif
            <div class="space-y-9">{!! $project->body !!}</div>
        </div>
    @else
        <div class="grid grid-cols-3 gap-3">
            @if ($project->thumb)
                <img src="{{ url('storage/' . $project->thumb) }}" alt="placeholder_image" />
            @else
                <img src="{{ url('storage/images/placeholder.jpg') }}" />
            @endif
            <div class="mb-5 col-span-2">{!! $project->excerpt !!}</div>
        </div>
    @endif

    <footer class="mt-5">
        @if ($project->category)
            <a href="/projects/categories/{{ $project->category->slug }}">
                <span>Category: {{ $project->category->name }}</span>
            </a>
        @endif

        @if (count($project->tags))
            <div class="text-xs">Tags:
                @foreach ($project->tags as $tag)
                    <a href="/projects/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        @endif
    </footer>
</div>
