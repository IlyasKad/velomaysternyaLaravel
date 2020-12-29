@extends('layouts.app')
@section('content')

<div class="container">
    <div>
        <a href="/admin/pages/root">На одну сходинку вище</a>
    </div>
    <h2 class="create__title">Існуючі сутності </h2>
    <div class="entiry__header-h2">
        @foreach ($entities as $entity)
        @if($entity->name != 'empty')
        {{$entity->name}}
        <div class="buttons__entity">
            <div class="buttons__entity-item">
                <a class="btn btn-dark button-product" href="{{route('entities.show', $entity->id)}}"> Додати поле для сутності </a>
            </div>

            <div class="buttons__entity-item">
            <a class="btn btn-dark button-product" href="{{route('entities.edit', $entity->id)}}"> Редагувати </a>
            </div>
            <div class="buttons__entity-item">
            <form class="add-blog__form" action="{{route('entities.destroy', $entity->id)}}" method="post">
            @csrf
            <button class="btn btn-dark button-product" type="submit">Видалити</button>
            </form>
            </div>
        </form>
        </div>


        @endif
        @endforeach
    </div>

    <h3 class="create__title">Створення нової сутності </h3>
    <form class="create-form" action="{{route('entities.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        @error('name')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="name" name="name"
                placeholder="Введіть назву сутності англійською" value="">
        </div>

        <div class="input-group mb-3">
            <button class="btn btn-primary" type="submit">Створити</button>
        </div>

    </form>
</div>

@endsection
