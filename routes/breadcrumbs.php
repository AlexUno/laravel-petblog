<?php


use App\Models\Category;
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
// End admin
