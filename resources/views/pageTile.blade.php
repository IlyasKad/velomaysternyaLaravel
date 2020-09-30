<div class="tile-products__item">
    <a class="tile-products__item-link" href="{{ route('pages.show', $page->code) }}">
        <div class="tile-products__img-product">
            <img class="tile-products__image" src=" {{asset('storage/images/' . $page->image_intro )}}" alt="Bike" />
        </div>

        <div class="tile-products__title-product">
            {{$page->caption}}
            <div class="tile-products__intro">
                {{$page->intro}}
            </div>

            <div class="tile-products__bottom">
                <div class="tile-products__price">
                    {{$page->price}} <img class="image-sign" src="/images/sign.png">
                </div>
                <div class="tile-products__btn">Купити</div>
            </div>

            <div>
            <a href="{{route('pages.edit', $page->code)}}">
                <button class="btn btn-dark button-product">Редагувати</button>
            </a>
        </div>
        <form class="add-blog__form" action="{{route('pages.destroy', $page->code)}}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-dark button-product" type="submit">Видалити</button>
        </form>
        </div>
        
    </a>
</div>