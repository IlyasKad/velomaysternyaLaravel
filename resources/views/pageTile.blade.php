<div class="tile-products__item">
    <a class="tile-products__item-link" href="{{ route('userShow', $page->code) }}">
        <div class="tile-products__img-product">

            <img class="tile-products__image" src=" {{asset('images/images/' . $page->image_intro )}}" alt="Bike" />
        </div>

        <div class="tile-products__title-product">
            {{$page->caption}}
            <div class="tile-products__intro">
                {{$page->intro}}
            </div>

            @if ($page->container->type == 'one product')
            <div class="tile-products__bottom">
                <div class="tile-products__price">
                    {{$page->price}} <img class="image-sign" src="/images/sign.png">
                </div>
                <div class="tile-products__btn">Купити</div>
            </div>
            @endif
        </div>
    </a>
</div>
