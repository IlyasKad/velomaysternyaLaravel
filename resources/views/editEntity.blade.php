@extends('layouts.app')
@section('content')
<div class="container">

    <h1 class="create__title">Оновлення сутності: {{$entity->name}}</h1>
    <form class="create-form" action="{{route('entities.update', $entity->id)}}" method="post"
        enctype="multipart/form-data">       
        @csrf       
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="name" name="name" 
                value="{{$entity->name}}">
        </div>
        @error('name')<label class="alert-danger">{{ $message }}</label>@enderror 
        <div class="input-group mb-3">
            <button class="btn btn-primary" type="submit">Оновити</button>
        </div>
    </form>


    <br> <br> <br> <br> <h1>Додаткові поля: </h1> <br>
    @foreach ($entity->fields as $field) 
        Поле: {{$field->name}} <a href="{{route('fields.edit', $field->id)}}"> Редагувати </a>
        <br>               
         <form class="add-blog__form" 
            action="{{route('fields.destroy', $field->id)}}" method="post">
            @csrf
            <button class="btn btn-dark button-product" type="submit">Видалити</button>
        </form>             
    @endforeach


</div>
@endsection