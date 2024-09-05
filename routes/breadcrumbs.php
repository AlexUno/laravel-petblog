<?php


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


// Admin section

/* -------------------------- Users ---------------------------------------*/
Breadcrumbs::for('admin.dashboard.index', function(BreadcrumbTrail $trail){
    $trail->push('Главная', route('admin.dashboard.index'));
});

Breadcrumbs::for('admin.users.index', function(BreadcrumbTrail $trail){
    $trail->parent('admin.dashboard.index');
    $trail->push('Пользователи', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function(BreadcrumbTrail $trail){
    $trail->parent('admin.users.index');
    $trail->push('Добавить пользователя', route('admin.users.create'));
});

Breadcrumbs::for('admin.users.edit', function(BreadcrumbTrail $trail, User $user){
    $trail->parent('admin.users.index');
    $trail->push('Редактировать пользователя', route('admin.users.edit', ['user' => $user]));
});
/* ---------------------------- End users -----------------------------------*/

/* -------------------------- Categories ---------------------------------------*/
Breadcrumbs::for('admin.categories.index', function(BreadcrumbTrail $trail){
    $trail->parent('admin.dashboard.index');
    $trail->push('Категории', route('admin.categories.index'));
});

Breadcrumbs::for('admin.categories.create', function(BreadcrumbTrail $trail){
    $trail->parent('admin.categories.index');
    $trail->push('Добавить категорию', route('admin.categories.create'));
});

Breadcrumbs::for('admin.categories.edit', function(BreadcrumbTrail $trail, Category $category){
    $trail->parent('admin.categories.index');
    $trail->push('Редактировать категорию', route('admin.categories.edit', ['category' => $category]));
});

/* -------------------------- End categories  ----------------------------------*/

/* -------------------------- Tags ---------------------------------------*/
Breadcrumbs::for('admin.tags.index', function(BreadcrumbTrail $trail){
    $trail->parent('admin.dashboard.index');
    $trail->push('Теги', route('admin.tags.index'));
});

Breadcrumbs::for('admin.tags.create', function(BreadcrumbTrail $trail){
    $trail->parent('admin.tags.index');
    $trail->push('Добавить тег', route('admin.tags.create'));
});

Breadcrumbs::for('admin.tags.edit', function(BreadcrumbTrail $trail, Tag $tag){
    $trail->parent('admin.tags.index');
    $trail->push('Редактировать тег', route('admin.tags.edit', ['tag' => $tag]));
});

/* -------------------------- End tags  ----------------------------------*/

/* -------------------------- Posts ---------------------------------------*/

Breadcrumbs::for('admin.posts.index', function(BreadcrumbTrail $trail){
    $trail->parent('admin.dashboard.index');
    $trail->push('Посты', route('admin.posts.index'));
});

Breadcrumbs::for('admin.posts.create', function(BreadcrumbTrail $trail){
    $trail->parent('admin.posts.index');
    $trail->push('Добавить пост', route('admin.posts.create'));
});

Breadcrumbs::for('admin.posts.show', function(BreadcrumbTrail $trail, Post $post){
    $trail->parent('admin.posts.index');
    $trail->push($post->title, route('admin.posts.show', ['post' => $post]));
});

Breadcrumbs::for('admin.posts.edit', function(BreadcrumbTrail $trail, Post $post){
    $trail->parent('admin.posts.index');
    $trail->push('Редактировать пост', route('admin.posts.edit', ['post' => $post]));
});

/* -------------------------- End posts  ----------------------------------*/
// End admin


// Site section

/* -------------------------- Main ---------------------------------------*/

Breadcrumbs::for('index', function(BreadcrumbTrail $trail){
    $trail->push('Главная', route('index'));
});

/* -------------------------- End main ---------------------------------------*/


/* -------------------------- Posts ---------------------------------------*/

Breadcrumbs::for('posts.index', function(BreadcrumbTrail $trail){
    $trail->parent('index');
    $trail->push('Наш блог', route('posts.index'));
});

Breadcrumbs::for('posts.show', function(BreadcrumbTrail $trail, Post $post){
    $trail->parent('posts.index');
    $trail->push($post->title, route('posts.show', ['post' => $post]));
});

/* -------------------------- End posts  ----------------------------------*/

// End site
