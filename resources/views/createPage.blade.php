@extends('layouts.app')
@section('content')
<div class="container">
    <div>
        <a href="/admin/pages/root">На одну сходинку вище</a>
    </div>
    <div class="create__header">
        <h2>Вибір сутності сторінки </h2>
        <div class="entity__choose">
            @foreach ($entities as $entity)
            @if($entity->name != 'empty')
            <ul>
                <li>
                    <a href="{{ route('pages.create', $entity->id)}}"> {{$entity->name}}</a>
                </li>
            </ul>
            @endif
            @endforeach
        </div>

    </div>

    <h3 class="create__title">Створення нової сторінки </h3>
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
            <input class="form-control" type="text" id="caption_ua" name="caption_ua"
                placeholder="Введіть назву товару українською" value="">
        </div>
        @error('caption_ua')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="caption_en" name="caption_en"
                placeholder="Введіть назву товару англійською" value="">
        </div>
        @error('caption_en')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="content_ua" name="content_ua"
                placeholder="Введіть опис товару українською" value="">
        </div>
        @error('content_ua')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="content_en" name="content_en"
                placeholder="Введіть опис товару англійською" value="">
        </div>
        @error('content_en')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="intro_ua" name="intro_ua"
                placeholder="Введіть короткий опис товару українською" value="">
        </div>
        @error('intro_ua')<label class="alert-danger">{{ $message }}</label>@enderror
        <div class="input-group mb-3">
            <input class="form-control" type="text" id="intro_en" name="intro_en"
                placeholder="Введіть короткий опис товару англійською" value="">
        </div>
        @error('intro_en')<label class="alert-danger">{{ $message }}</label>@enderror



        <div class="input-group mb-3">
            <select id="parent" name="parent">
                @foreach ($categories as $categoryPage)
                <option value="{{$categoryPage->id}}">{{$categoryPage->caption_en}}</option>
                @endforeach
            </select>
        </div>

        <h3 style="margin: 40px 0 0">Кастомні поля для сутності: {{$currentEntity->name}}</h3><br>
        <input type="hidden" id="entity" name="entity_id" value="{{$currentEntity->id}}">


        @if ($currentEntity->name != 'empty')
        @foreach ($currentEntity->fields as $field)
        <div class="input-group mb-3 btn__create_entity"> {{$field->caption}}</div>
        <input class="form-control" type="text" name="{{$field->name}}" value="">
        @endforeach
        @endif

        <div class="btn__create_entity">
            <button class="btn btn-primary" type="submit">Створити</button>
        </div>

    </form>
</div>
@endsection
