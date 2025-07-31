<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Blog</title>
</head>
<body>
<header class="header">
    @if (session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="header-content">
            <a href="/" class="logo">Blog</a>

            <!-- Search bar -->
            <div class="search-container">
                <form action="#" method="GET" class="search-form">
                    <input
                        type="text"
                        name="search"
                        placeholder="Find something..."
                        class="search-input"
                        aria-label="Search posts"
                        value="{{ request('search') }}"
                    >
                    <button type="submit" class="search-button" aria-label="Search">
                        <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <nav>
                <ul class="nav">
                    @auth
                        <li>Welcome, {{ auth()->user()?->username }}</li>

                        <form method="POST" action="/logout">
                            @csrf

                            <button type="submit">Logout</button>
                        </form>
                    @else
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Log In</a></li>
                    @endauth

                </ul>
            </nav>
        </div>
    </div>
</header>
<main class="main">
    <div class="container">
        {{ $slot }}
    </div>
</main>

<footer class="footer">
    <div class="container">
        <p>&copy; {{ date('Y') }} Blog. Built with Laravel.</p>
    </div>
</footer>
</body>
</html>
