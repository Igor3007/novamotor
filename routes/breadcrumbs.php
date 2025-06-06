<?php

use Illuminate\Support\Facades\Route;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog'));
});

Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('catalog');
    $trail->push($category->title, route('category', $category->slug));
});
Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('category',$product->category);
    $trail->push($product->title, route('product', $product->slug));
});
Breadcrumbs::for('page', function (BreadcrumbTrail $trail, $page) {
    $trail->parent('home');
    $trail->push($page->title, route('product', $page->slug));
});
