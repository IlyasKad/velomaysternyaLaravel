@extends('layouts.app')
@section('title', 'Всі велосипеди')
<link href="{{ asset('css/allPages.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="tile-products__content">
        <h1 class="name-page__title name-page__title-all-pages">
            Усі велосипеди
        </h1>
        <div class="tile-products__main">

            @foreach ($tiles as $tile)
                {{$tile}}
            @endforeach
        </div>
    </div>
</div>
@endsection