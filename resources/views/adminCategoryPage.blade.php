@extends('layouts.app')
@section('title', 'Адмін - Всі велосипеди')
<link href="{{ asset('css/allPages.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="tile-products__content">
        <div class="btn-back">
            {{-- @if ($page->parent->code != "root") --}}
            <a href="{{ route('pages.show', $page->parent->code)}}">На одну сходинку вище</a>
            {{-- @endif --}}
        </div>

        <div>
            <a href="{{ route('entities.create')}}">
              <h5>Створити сутність</h5>
            </a>
       </div>
       <div>
            <a href="{{ route('pages.create', 1)}}">
               <h5>
                    Створити нову сторінку
               </h5>
           </a>
       </div>

        <h1 class="name-page__title name-page__title-all-pages">
            {{$page->caption_ua}}
            {{-- big block of code? information and more --}}
        </h1>

        <div class="admin-buttons">
            <div class="admin-buttons-right">
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

    <p class="bike-desc">
        {{$page->content_ua}}
    </p>
    <hr>

    <div class="sort-tiles">
        @foreach ($page->orderTypes as $key => $value)
        <a class="sort-tiles__items" href="{{ route('pages.show',[$page->code, $key])}}">{{$value}}</a>
        @endforeach
    </div>

    <div>
        <p>Поточний вид сортування: {{$page->orderTypes[$page->orderType]}}</p>
    </div>
    <span>

        @foreach ($tiles as $tile)
        {{$tile}}
        @endforeach
    </span>
</div>

</div>
@endsection
