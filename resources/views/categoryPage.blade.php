@extends('layouts.app')
@section('title', 'Всі велосипеди')
<link href="{{ asset('css/allPages.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="tile-products__content">
        <div class="btn-back">
            @if ($page->parent->code != "root")
            <a href="{{ route('userShow', $page->parent->code)}}">На одну сходинку вище</a>
            @endif
        </div>
        <h1 class="name-page__title name-page__title-all-pages">
            {{$page->caption_ua}} велосипеди
        </h1>

        <div>
            <img class="tile-products__image" src=" {{asset('images/images/' . $page->image_intro )}}" alt="Bike" />
        </div>
        <p class="bike-desc">
            {{$page->content_ua}}
        </p>

        <hr>
        <div class="sort-tiles">
            @foreach ($page->orderTypes as $key => $value)
            <a class="sort-tiles__items" href="{{ route('userShow',[$page->code, $key])}}">{{$value}}</a>
            @endforeach
        </div>
        <div>
            <p>Поточний вид сортування: {{$page->orderTypes[$page->orderType]}}</p>
        </div>

        <div class="tile-products__main">

            @foreach ($tiles as $tile)
            {{$tile}}
            @endforeach
        </div>
    </div>

</div>
@endsection
