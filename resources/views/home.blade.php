@extends('layouts.app')
@section('title', 'Веломайстерня')
<link href="{{ asset('css/home.css') }}" rel="stylesheet"> 
@section('content')
<!-- header slider -->
<section class="header-slider">
    <div class="container">
        <div class="header-slider__content">
            <div class="header-slider__title">
                <span class="top-title">
                    Нова колекція
                </span>
                <div class="bottom-title">
                    2020
                </div>
            </div>
            <div class="header-slider__description">
                28" Cannondale TOPSTONE
            </div>
            <a class="header-slider__btn" href="{{ route('allPages') }}">Придбати</a>
        </div>
    </div>
</section>

<!-- section of advantages  -->
<section class="advantages">
    <div class="container">
        <div class="advantages__content">
            <div class="advantages__title">
                чому обирають нас
            </div>

            <div class="advantages__row">
                <div class="advantages__row-item">
                    <img class="advantages__row-icon" src="images/advantages-icon1.svg" alt="icon of advantages" />
                    <div class="advantages__row-name-icon">
                        <div class="advantages__row-title">
                            Безкоштовна доставка
                        </div>
                        <div class="advantages__row-description">
                            Доставимо замовлення від 3000 грн безкоштовно.
                        </div>
                    </div>
                </div>
                <div class="advantages__row-item">
                    <img class="advantages__row-icon" src="images/advantages-icon2.svg" alt="icon of advantages" />
                    <div class="advantages__row-name-icon">
                        <div class="advantages__row-title">
                            Великий вибір товарів
                        </div>
                        <div class="advantages__row-description">
                            У нас є величезний вибір велосипедів - близько 700 видів.
                        </div>
                    </div>
                </div>
            </div>

            <div class="advantages__row">
                <div class="advantages__row-item">
                    <img class="advantages__row-icon" src="images/advantages-icon3.svg" alt="icon of advantages" />
                    <div class="advantages__row-name-icon">
                        <div class="advantages__row-title">
                            Консультація фахівців
                        </div>
                        <div class="advantages__row-description">
                            Якщо ви заплуталися в величезному виборі, зверніться до наших
                            фахівців.
                        </div>
                    </div>
                </div>
                <div class="advantages__row-item">
                    <img class="advantages__row-icon" src="images/advantages-icon4.svg" alt="icon of advantages" />
                    <div class="advantages__row-name-icon">
                        <div class="advantages__row-title">
                            Зручна оплата
                        </div>
                        <div class="advantages__row-description">
                            Оплату можна здійснювати через карту і готівкою.
                        </div>
                    </div>
                </div>
            </div>

            <div class="advantages__row">
                <div class="advantages__row-item">
                    <img class="advantages__row-icon" src="images/advantages-icon5.svg" alt="icon of advantages" />
                    <div class="advantages__row-name-icon">
                        <div class="advantages__row-title">
                            Гарантія від магазину
                        </div>
                        <div class="advantages__row-description">
                            Ми надаємо гарантію терміном на 60 днів.
                        </div>
                    </div>
                </div>
                <div class="advantages__row-item">
                    <img class="advantages__row-icon" src="images/advantages-icon6.svg" alt="icon of advantages" />
                    <div class="advantages__row-name-icon">
                        <div class="advantages__row-title">
                            Щомісячні знижки
                        </div>
                        <div class="advantages__row-description">
                            Знижки до 70% на різні види велосипедів.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- about company -->
<section class="about-company">
    <div class="container">
        <div class="about-company__content">
            <div class="about-company__title">
                Про компанію
            </div>
            <div class="about-company__description">
                Ми пропонуємо моделі брендових велосипедів високої якості. Вони не
                підведуть власника в поїздках по місту, прогулянках по природі, під
                час занять спортом. Наш магазин працює з постачальниками на пряму. У
                нас представлена продукція наступних відомих брендів Apollo,
                Bellelli, BerGaMont, та інших. Ми пропонуємо купити велосипед за
                вигідною ціною з доставкою по Києву та іншими містами України.
            </div>

            <div class="about-company__menu-icons">
                <img src="images/about-clock.svg" alt="clock icon" />
                <img src="images/about-certificate.svg" alt="certificate icon" />
                <img src="images/about-sold.svg" alt="sold icon" />
            </div>

            <div class="about-company__list-subtitle">
                <div class="about-company__subtitle">
                    Працюємо <br />з 2010 року
                </div>
                <div class="about-company__subtitle">
                    Сертифікована <br />продукція
                </div>
                <div class="about-company__subtitle">20 продажів <br />в день</div>
            </div>

            <div class="about-company__btn-wrapper">
                <a class="about-company__btn" href="/products">Замовити</a>
            </div>
        </div>
    </div>
</section>


@endsection