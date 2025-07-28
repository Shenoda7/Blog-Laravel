<x-layout>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
                <?php start_measure("Load Queries"); ?>
            <p>
               By <a href="">{{ $post->user->name }}</a> <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>
                <?php stop_measure("Load Queries"); ?>
            <div>{{ $post->excerpt }}</div>
        </article>
    @endforeach
</x-layout>
