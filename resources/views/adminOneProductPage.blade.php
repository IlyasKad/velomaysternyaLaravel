@extends('layouts.app')
@section('title', $page->caption)
<link href="{{ asset('css/allPages.css') }}" rel="stylesheet">
@section('content')
<!-- name of page -->
<section class="name-page">
    <div class="container">
        <div class="name-page__content">
            <div class="name-page__path">
                <a href="{{ route('pages.show', $page->parent->code)}}">На одну сходинку вище</a>
            </div>

            <div>
                Категорія: {{$page->parent->caption_ua}}
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
                <img src="{{asset('images/images/' . $page->image_content )}}" alt="photo of product" />
            </div>
            <p class="main-block__text">
                {{$page->content_ua}}
            </p>

        </div>


        <div class="main-block__buy-btn-wrapper">
            <a href="#" class="main-block__buy-btn">Купити</a>
        </div>
        <div class="main-block__date">
            <div>
                Надійшов в магазин : {{$page->created_at}}
            </div>
            <div>
                Останнє оновлення товару : {{$page->updated_at}}
            </div>
        </div>
        <div>



            <p> customFieldsView </p>
            {{$page->customFieldsView}}




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
