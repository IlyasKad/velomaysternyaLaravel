@extends('layouts.app')
@section('title', 'Всі велосипеди')
<link href="{{ asset('css/allPages.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="tile-products__content">
        <h1>Велосипеди</h1>
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