<div class="tile-products__item">
    <a class="tile-products__item-link" href="{{ route('page', $page->code) }}">
        <div class="tile-products__img-product">
            <img src="/images/{{$page->image_content}}" alt="Bike" />
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
        </div>
    </a>
</div>