@extends('layouts.app')
@section('content')

<div class="container">
    <div class="link__entity">
        <a href="{{route('entities.create')}}"> Повернутись до списку сутностей і створення
            нових</a>
    </div>


    <h2 class="entiry__header-h2">Сутність: {{$entity->name}}</h2>
    <div class="entiry__header-h2">

        <h2>Існуючі поля сутності: </h2>
        @foreach ($entity->fields as $field)
        <p>
            Назва сутності англійською: {{$field->name}}, Опис сутності: {{$field->caption}}, Номер в списку полів: {{$field->order_num}}
        </p>
        @endforeach
    </div>


    <h3 class="create__title">Додавання нового поля для сутності </h3>
    <form class="create-form" action="{{route('fields.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" id="entity_id" name="entity_id" value="{{$entity->id}}">

        @error('name')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="name" name="name"
                placeholder="Введіть назву сутності англійською одним словом" value="">
        </div>

        @error('caption')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="caption" name="caption"
                placeholder="Введіть опис сутності українською" value="">
        </div>

        @error('order_num')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="order_num" name="order_num"
                placeholder="Введіть номер в списку полів" value="">
        </div>

        <div class="input-group mb-3">
            <button class="btn btn-primary" type="submit">Додати поле сутності</button>
        </div>

    </form>
</div>

@endsection
