@extends('layouts.app')
@section('content')
<div class="container">

    <h1 class="create__title">Оновлення поля сутності: {{$field->name}}</h1>
    <form class="create-form" action="{{route('fields.update', $field->id)}}" method="post"
        enctype="multipart/form-data">       
        @csrf       
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="name" name="name" 
                value="{{$field->name}}">
        </div>
        @error('name')<label class="alert-danger">{{ $message }}</label>@enderror 

        <div class="input-group mb-3">
            <input class="form-control" type="text" id="caption" name="caption" 
                value="{{$field->caption}}">
        </div>
        @error('caption')<label class="alert-danger">{{ $message }}</label>@enderror 

        <div class="input-group mb-3">
            <input class="form-control" type="text" id="order_num" name="order_num" 
                value="{{$field->order_num}}">
        </div>
        @error('order_num')<label class="alert-danger">{{ $message }}</label>@enderror 

        <div class="input-group mb-3">
            <button class="btn btn-primary" type="submit">Оновити</button>
        </div>
    </form>

</div>
@endsection