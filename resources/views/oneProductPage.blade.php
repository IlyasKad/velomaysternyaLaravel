@extends('layouts.app')
@section('title', $page->caption)
<link href="{{ asset('css/allPages.css') }}" rel="stylesheet">
@section('content')


<!-- name of page -->
<section class="name-page">
    <div class="container">
        <div class="name-page__content">
            <div class="name-page__path">
                @if ($page->parent->code != "root")
                <a href="{{ route('userShow', $page->parent->code)}}">На одну сходинку вище</a>
                @endif
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
                {!! $page->content !!}
            </p>

        </div>


        <h2> Кастомні поля: </h2>
        <div >
            {{$page->customFieldsView}}
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
    </div>

</section>

@endsection
