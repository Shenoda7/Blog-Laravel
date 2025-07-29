<x-layout>
    <a href="/" class="back-link">Back to Posts</a>

    <article>
        <header class="post-header">
            <h1>{{ $post->title }}</h1>
            <div class="post-meta">
                <span>By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a></span>
                <span>•</span>
                <a href="/categories/{{ $post->category->slug }}" class="post-category">
                    {{ $post->category->name }}
                </a>
            </div>
        </header>

        <div class="post-content">
            {!! $post->body !!}
        </div>
    </article>
</x-layout>
