@extends('layouts.app')
@section('title', $page->caption)
<link href="{{ asset('css/allPages.css') }}" rel="stylesheet">
@section('content')
<!-- name of page -->
<section class="name-page">
    <div class="container">
        <div class="name-page__content">
            <div class="name-page__path">
                <div class="name-page__pre-main-path">
                    <a href="{{ route('pages.index')}}">Велосипеди</a>
                </div>
                <img class="name-page__image-path" src="/images/search-path.svg" alt="search path icon" />
                <div class="name-page__additional">
                    <a href="{{ route('pages.show', $page->code) }}">{{ $page->caption}}</a>
                </div>
            </div>
            <h1 class="name-page__title">
                {{ $page->caption}}
            </h1>
        </div>
    </div>
</section>

<!-- main block -->
<section class="main-block">
    <div class="container">
        <div class="main-block__content">
            <div class="main-block__image">
                <img src="{{asset('storage/images/' . $page->image_content )}}" alt="photo of product" />
            </div>
            <p class="main-block__text">
                {{$page->content}}
            </p>

        </div>

        <div class="main-block__price">
            <span>Ціна: </span>
            {{$page->price}} <img class="main-block__image-sign" src="/images/sign.png">
        </div>
        <div class="main-block__buy-btn-wrapper">
            <a href="#" class="main-block__buy-btn">Купити</a>
        </div>
        <div class="main-block__date">
            <div >
                Надійшов в магазин : {{$page->created_at}}
            </div>
            <div>
                Останнє оновлення товару : {{$page->updated_at}}
            </div>
        </div>
        <div>
            <a href="{{route('pages.edit', $page->code)}}">
                <button class="btn btn-dark button-product">Редагувати</button>
            </a>
        </div>
        <form class="add-blog__form" action="{{route('pages.destroy', $page->code)}}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-dark button-product" type="submit">Видалити</button>
        </form>
    </div>

</section>

@endsection