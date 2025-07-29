<x-layout>
    @if($posts->count() > 0)
        <div class="posts-grid">
            @foreach ($posts as $post)
                <article class="post-card">
                    <h2 class="post-title">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <div class="post-meta">
                        <span>By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a></span>
                        <span>•</span>
                        <a href="/categories/{{ $post->category->slug }}" class="post-category">
                            {{ $post->category->name }}
                        </a>
                    </div>

                    <div class="post-excerpt">
                        {{ $post->excerpt }}
                    </div>
                </article>
            @endforeach
        </div>
        @if(method_exists($posts, 'links'))
            <div class="pagination-container mt-4">
                {{ $posts->links() }}
            </div>
        @endif

    @else
        <div class="empty-state">
            <h2>No posts found</h2>
            <p>There are no posts to display at the moment.</p>
        </div>
    @endif
</x-layout>
