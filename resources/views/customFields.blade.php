
<div class="main-block__price">
    @foreach ($fieldvalues as $fieldvalue)
    <div class="custom__filed">
        <span>  {{$fieldvalue->field->caption}} : </span>   {{$fieldvalue->value}}
    </div>
    @endforeach
</div>
