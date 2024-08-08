# Laravel Blog Pet-Project

A simple blog application built with laravel framework.

## Features (Planned)

- Main page with common information
- Categories for posts
- Tags for posts
- User registration and authentication
- Create, edit, and delete blog posts
- Like and dislike posts
- Comment on posts
- Admin panel for managing posts, categories, tags, users and comments

## Installation

### Requirements

- PHP 7.4 or higher
- Composer
- MySQL or another supported database

### Steps

1. Clone the repository:

```bash
git clone https://github.com/AlexUno/laravel-petblog.git
cd laravel-petblog
```

2. Install dependencies:

```bash
composer install
npm install
npm run dev
```

3. Copy the `.env.example` file to `.env`

```bash
cp .env.example .env
```

4. Generate an application key:

```bash
php artisan key:generate
```

5. Run the database migrations and seed the database:

```bash
php artisan migrate --seed
```

6. Start the development server:

```bash
php artisan serve
```

7. Open your browser and visit: `http://localhost:8000`

## Usage

### Creating Posts (Planned)

- Register an account and log in.
- Navigate to the "Posts" page and click the "Create Post".
- Fill in the form and submit to create a new post.

### Liking and Disliking Posts (Planned)

- Click the "Like" button to like a post.
- Click the "Dislike" button to dislike a post.
- If you click "Dislike" after liking a post, the like will be removed and the dislike will be added, and vice versa.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue to discuss what you would like to change.

## License

This project in open-sourced software licensed under the MIT license.
