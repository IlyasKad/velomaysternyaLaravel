<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap&subset=cyrillic"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap&subset=cyrillic"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__content">
                <nav class="header__additional-menu">
                    <ul class="header__menu-list">
                        <li><a href="{{ route('userIndex') }}">Велосипеди</a></li>
                        <li><a href="/">Контакти</a></li>
                        <li><a href="/">Акції</a></li>
                    </ul>
                </nav>

                <div class="header__logo-wrapper">
                    <a href="/">
                        <img class="header__logo-img" src="{{ asset('images/main-logo.svg') }}"
                            alt="Логотип" />
                    </a>
                    <div class="header__logo-description">
                        Магазин велосипедів
                    </div>
                </div>

                <div class="header__visitors-sidebar">
                    <div class="header__contacts-data">
                        <ul class="header__contact-list">
                            <li>
                                <span class="header__contact-item-unique">+38 (068) 92 519 04</span>
                            </li>
                            <li>
                                <span class="header__contact-item">м. Київ вул. Зарічна 25</span>
                            </li>
                            <li>
                                <span class="header__contact-item">Пон-суб з 09:00 до 18:00</span>
                            </li>
                        </ul>
                    </div>
                    <div class="header__menu-authorization">
                        <div class="header__menu-links">
                            <a href="/">
                                <img class="sign-in-logo" src="{{ asset('images/sign-in-logo.svg')}}" alt="Sign in logo" />
                               
                            </a>
                            <a href="/">
                                <img src="{{ asset('images/basket-logo.svg')}}" alt="Basket logo logo" />
                               
                            </a>
                            
                        </div>
                        <div class="header__profile-title">
                            <a href="/">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>


    @yield('content')

    <!-- top of footer -->
    <section class="footer-top">
        <div class="container">
            <div class="footer-top__content">
                <div class="footer-top__contacts-menu">
                    <div id="footer-top__logo">
                        <a href="/">
                            <img src="{{ asset('images/footer-top-logo.svg')}}" alt="logo of top footer " />
                        </a>
                    </div>
                    <ul class="footer-top__contacts-list">
                        <li class="footer-top__contacts-address">
                            м. Київ вул. Євгена Сверстюка 25
                        </li>
                        <li class="footer-top__contacts-address">
                            м. Львів вул. Липинського 36
                        </li>
                        <li class="footer-top__contacts-phone">
                            +38 (068) 92 519 04
                            <a class="footer-top__unique" href="/">
                                <img src="{{ asset('images/telegram-icon.svg')}}" alt="telegram icon" />
                            </a>
                            <a class="footer-top__unique" href="/">
                                <img src="{{ asset('images/viber-icon.svg')}}" alt="viber icon" />
                            </a>
                        </li>
                        <li class="footer-top__email">
                            info@velokratia.com.ua
                        </li>
                        <li class="footer-top__schedule">
                            Пон-суб з 09:00 до 18:00
                        </li>
                    </ul>
                </div>

                <div class="footer-top__main-column">
                    <div class="footer-top__column-title">
                        Продукція
                    </div>
                    <ul class="footer-top__column-list">
                        <li>
                            <a href="/products">Велосипеди</a>
                        </li>
                        <li>
                            <a href="#"> Аксесуари</a>
                        </li>
                        <li>
                            <a href="#"> Запчастини</a>
                        </li>
                        <li>
                            <a href="#"> Екіпірування</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-top__main-column">
                    <div class="footer-top__column-title">
                        Про магазин
                    </div>
                    <ul class="footer-top__column-list">
                        <li>
                            <a href="/">Про нас</a>
                        </li>
                        <li>
                            <a href="/product"> Відгуки про магазин</a>
                        </li>
                        <li>
                            <a href="/product">Гарантія</a>
                        </li>
                        <li>
                            <a href="/product">Оплата та доставка</a>
                        </li>
                        <li>
                            <a href="/product">Розстрочка</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-top__main-column">
                    <div class="footer-top__column-title">
                        Додаткові
                    </div>
                    <ul class="footer-top__column-list">
                        <li>
                            <a href="/products"> Виробники</a>
                        </li>
                        <li>
                            <a href="/"> FAQ</a>
                        </li>
                        <li>
                            <a href="/"> Блог</a>
                        </li>
                        <li>
                            <a href="/"> Контакти</a>
                        </li>
                        <li>
                            <a href="/products">Акції</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-top__join">
                    <div class="footer-top__join-title">
                        Стежте за нами
                    </div>
                    <div class="footer-top__join-menu-icons">
                        <div class="footer-top__join-list">
                            <a href="/">
                                <img class="footer-top__icon-img" src="{{ asset('images/youtube-icon.svg')}}"
                                    alt="facebook icon" /></a>
                            <a href="/">
                                <img class="footer-top__icon-img" src="{{ asset('images/instagram-icon.svg')}}"
                                    alt="instagram icon" /></a>
                            <a href="/">
                                <img class="footer-top__icon-img" src="{{ asset('images/facebook-icon.svg')}}"
                                    alt="facebook icon" /></a>
                            <a href="/">
                                <img class="footer-top__icon-img" src="{{ asset('images/twitter-icon.svg')}}"
                                    alt="facebook icon" /></a>
                        </div>
                    </div>
                    <form action="" method="post" class="footer-top__join-form">
                        <input class="footer-top__form-item" type="email" name="email"
                            placeholder="Введіть свій E-mail" />
                        <button type="submit" name="send" class="footer-top__join-btn">
                            Підписатися
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer__content">
                <div class="footer__row-first">
                    <div class="footer-logo">
                        <a href="/">
                            <img src="{{ asset('images/footer-logo.svg')}}" alt="footer logo" />
                        </a>
                    </div>
                    <div class="footer__item">
                        <a href="#">Про компанію</a>
                    </div>
                    <div class="footer__item">
                        <a href="#">Угода користувача</a>
                    </div>
                    <div class="footer__item">
                        <a href="#">Політика конфіденційності</a>
                    </div>
                    <div class="footer__item">
                        <a href="#">Політика використання файлів cookie</a>
                    </div>
                    <div class="footer__item">
                        <a href="#">Політика авторських прав</a>
                    </div>
                </div>
                <div class="footer__row-second">
                    <div class="footer__item">
                        <a href="#">Політика торгової марки</a>
                    </div>
                    <div class="footer__item">
                        <a href="#">Правила спільноти</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>