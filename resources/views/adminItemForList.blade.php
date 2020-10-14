<div class="tile-products__item">
    <a class="tile-products__item-link" href="{{ route('pages.show', $page->code) }}">
        <div class="tile-products__title-product">
            <p>{{$page->caption_ua}}</p>
            <div class="admin-buttons">
                <div class="admin-buttons-right">
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
        </div>
    </a>
</div>