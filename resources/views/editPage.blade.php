@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="create__title">Оновлення товару: {{$page->caption_ua}}</h1>
    <form class="create-form" action="{{route('pages.update', $page->code)}}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="main-block__image">
            <img class="main-block__img" src="{{asset('images/images/' . $page->image_content )}}"
                alt="photo of product" />
            <input type="file" id="image_content" name="image_content" accept="image/png, image/jpeg" />

        </div>
        @error('image_content')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="main-block__image">
            <img class="main-block__img" src="{{asset('images/images/' . $page->image_intro )}}"
                alt="photo of product" />
            <input type="file" id="image_intro" name="image_intro" accept="image/png, image/jpeg" />

        </div>
        @error('image_intro')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="code" name="code" placeholder="enter code"
                value="{{$page->code}}">

        </div>
        @error('code')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="caption_ua" name="caption_ua" placeholder="enter caption_ua"
                value="{{$page->caption_ua}}">
        </div>
        @error('caption_ua')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="caption_en" name="caption_en" placeholder="enter caption_en"
                value="{{$page->caption_en}}">
        </div>
        @error('caption_en')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="content_ua" name="content_ua" placeholder="enter content_ua"
                value="{{$page->content_ua}}">
        </div>
        @error('content_ua')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="content_en" name="content_en" placeholder="enter content_en"
                value="{{$page->content_en}}">
        </div>
        @error('content_en')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="intro_ua" name="intro_ua" placeholder="intro_ua"
                value="{{$page->intro_ua}}">
        </div>
        @error('intro_ua')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="intro_en" name="intro_en" placeholder="intro_en"
                value="{{$page->intro_en}}">
        </div>
        @error('intro_en')<label class="alert-danger">{{ $message }}</label>@enderror


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



        <br> <h1>Додаткові поля: </h1> <br>
        @if ($page->entity->name != 'empty')
             @foreach ($page->entity->fields as $field)
            <div class="input-group mb-3">
                {{$field->caption}} :
                @if(!empty($field->fieldvaluesByPageId($page->id)))
                    <input class="form-control" type="text" name="{{$field->name}}"
                        value="{{$field->fieldvaluesByPageId($page->id)->value}}">
                @else
                    <input class="form-control" type="text" name="{{$field->name}}"
                        value="">
                @endif
                @error($field->name)<label class="alert-danger">{{ $message }}</label>@enderror
            </div>
            @endforeach
        @endif


        <div class="input-group mb-3">
            <button class="btn btn-primary" type="submit">Оновити</button>
        </div>
    </form>
</div>
@endsection
