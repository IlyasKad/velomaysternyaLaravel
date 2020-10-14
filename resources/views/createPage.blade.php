@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="create__title">Створення нового товару</h1>
    <form class="create-form" action="{{route('pages.store')}}" method="post" enctype="multipart/form-data">
        @csrf  
        <div class="file-upload">
            <label class="create__label">Завантажте велике зображення</label>
            <input type="file" id="image_content" name="image_content" accept="image/png, image/jpeg" />
            @error('image_content')<label class="alert-danger">{{ $message }}</label>@enderror
        </div>
        
        <div class="file-upload">
            <label class="create__label">Завантажте маленьке зображення</label>
            <input type="file" id="image_intro" name="image_intro" accept="image/png, image/jpeg" />
            @error('image_intro')<label class="alert-danger">{{ $message }}</label>@enderror
        </div>
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="code" name="code" placeholder="Введіть код товару" value="">
        </div>
        @error('code')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="caption_ua" name="caption_ua" placeholder="Введіть назву товару українською"
                value="">
        </div>
         @error('caption_ua')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="caption_en" name="caption_en" placeholder="Введіть назву товару англійською"
                value="">
        </div>
        @error('caption_en')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="content_ua" name="content_ua" placeholder="Введіть опис товару українською"
                value="">
        </div>
        @error('content_ua')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="content_en" name="content_en" placeholder="Введіть опис товару англійською"
                value="">
        </div>
        @error('content_en')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="intro_ua" name="intro_ua" placeholder="Введіть короткий опис товару українською" value="">
        </div>
        @error('intro_ua')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="intro_en" name="intro_en" placeholder="Введіть короткий опис товару англійською" value="">
        </div>
        @error('intro_en')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="price" name="price" placeholder="Введіть вартість товару" value="">
        </div>
        @error('price')<label class="alert-danger">{{ $message }}</label>@enderror


        <div class="input-group mb-3">
            <select id="parent" name="parent">
                @foreach ($page->getCategories() as $categoryPage)
                    @if ($page->parent->code == $categoryPage->code)
                        <option value="{{$categoryPage->id}}" selected>{{$categoryPage->caption_en}}</option>
                    @else     
                        <option value="{{$categoryPage->id}}">{{$categoryPage->caption_en}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        
        
        <div class="input-group mb-3">
            <button class="btn btn-primary" type="submit">Створити</button>
        </div>

    </form>
</div>
@endsection