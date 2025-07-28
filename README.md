# Laravel Blog

A clean, modern blog application built with Laravel featuring category organization, author attribution, and SEO-friendly URLs.

## Features

- **Simple Blog Interface**: Clean, minimal design focused on content
- **Category Organization**: Posts organized by categories for easy navigation
- **Author Attribution**: Each post displays its author information
- **SEO-Friendly URLs**: Uses slugs instead of IDs for better URL structure
- **Responsive Design**: Basic responsive layout that works on all devices
- **Development Tools**: Comprehensive debugging and development tooling

## Tech Stack

- **Backend**: Laravel (PHP 8.2+)
- **Database**: supports MySQL/PostgreSQL
- **Frontend**: Blade templates with Tailwind CSS
- **Build Tool**: Vite
- **Testing**: PHPUnit with feature tests
- **Development**: Clockwork, Laravel Debugbar

## Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and npm
- Git

## Quick Start

### 1. Clone the Repository
```bash
git clone <your-repo-url>
cd blog
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
```bash
php artisan migrate
php artisan db:seed
```

### 5. Start Development Server
```bash
# Option 1: Start all services (recommended)
composer run dev

# Option 2: Start services individually
php artisan serve
npm run dev
```

Visit `http://localhost:8000` to see your blog!

## Project Structure

```
blog/
├── app/
│   ├── Models/          # Eloquent models (Post, Category, User)
│   └── Http/Controllers/ # Controllers (currently using route closures)
├── database/
│   ├── factories/       # Model factories for test data
│   ├── migrations/      # Database schema definitions
│   └── seeders/        # Database seeding logic
├── resources/
│   └── views/          # Blade templates
├── routes/
│   └── web.php         # Web route definitions
└── tests/              # PHPUnit tests
```

## Database Schema

### Posts Table
- `id` - Primary key
- `user_id` - Foreign key to users table
- `category_id` - Foreign key to categories table
- `slug` - Unique URL identifier
- `title` - Post title
- `excerpt` - Short description
- `body` - Full post content
- `published_at` - Publication timestamp
- `timestamps` - Created/updated timestamps

### Categories Table
- `id` - Primary key
- `name` - Category name
- `slug` - URL-friendly identifier
- `timestamps` - Created/updated timestamps

### Users Table
- Standard Laravel user fields (name, email, password, etc.)

## Routes

| Method | URL | Description |
|--------|-----|-------------|
| GET | `/` | Homepage - displays all posts |
| GET | `/posts/{slug}` | Individual post view |
| GET | `/categories/{slug}` | Posts filtered by category |

## Testing

Run the test suite:
```bash
php artisan test
```

The project includes feature tests for:
- Homepage functionality
- Individual post pages
- 404 handling for invalid routes
- Database content verification

## 🛠️ Development

### Available Commands

```bash
# Development
composer run dev          # Start all development services
php artisan serve         # Start Laravel development server
npm run dev              # Start Vite asset compilation

# Database
php artisan migrate       # Run database migrations
php artisan db:seed      # Seed database with sample data
php artisan migrate:fresh --seed  # Reset and seed database

# Testing
php artisan test         # Run all tests
composer run test        # Run tests with config clear

# Code Quality
./vendor/bin/pint        # Format PHP code
```

### Development Tools

- **Clockwork**: Debug and profile your application
- **Laravel Debugbar**: Development debugging toolbar

## Adding Content

### Creating Posts via Seeder
The `DatabaseSeeder` creates sample content:
- 1 user named "Shenoda"
- 5 sample posts with random content
- Categories are automatically created

### Manual Content Creation
You can create posts manually through:
- Database seeding with custom data
- Direct database insertion
- Future admin interface (not implemented)

## Customization

### Styling
- CSS is in `public/app.css`
- Tailwind CSS is configured for utility-first styling
- Layout component in `resources/views/components/layout.blade.php`

### Templates
- `resources/views/posts.blade.php` - Post listing template
- `resources/views/post.blade.php` - Individual post template
- `resources/views/components/layout.blade.php` - Base layout

## Configuration

### Environment Variables
Key environment variables in `.env`:
- `DB_CONNECTION` - Database type (sqlite, mysql, pgsql)
- `DB_DATABASE` - Database name
- `APP_DEBUG` - Debug mode (true for development)

### Database Configuration
The project uses SQLite by default for development. To use MySQL or PostgreSQL:
1. Update `.env` database configuration
2. Create the database
3. Run migrations

---