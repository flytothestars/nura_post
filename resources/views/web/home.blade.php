@extends('layouts.app')
@section('title', 'Главная страница')
@section('content')
    <div class="home-welcome">
        <div class="welcome-block">
            <p class="text-welcome">Купите онлайн товар из границы и получите доставку!</p>
            <div class="observation-input">
                <div class="input-block">
                    <label for="observation" class="label">Отслеживайте свой
                        товар</label>
                    <input placeholder="Введите трек-код" class="input" type="text" id="observation">
                </div>
                <button class="observation-btn">Следить</button>
            </div>
        </div>
    </div>
    <!-- <div class="mt80">
        <div class="rates-block"><span class="text">У нас
                лучшие тарифы.</span>
            <div class="rates-calculator">
                <div class="rates-price"><span class="text">Цена за
                        доставку&nbsp;</span><span class="text-price"><span>$</span> 4.20 </span>
                </div>
                <div class="rates-wrapper">
                    <div class="rates-range"><label class="label" for="product-weight">Вес продукта</label><input
                            class="product-ratesInput" disabled="" type="text" id="product-weight"><input type="range"
                            min="0" step="0.1" max="32" class="product-inputRange"></div>
                    <div class="rates-type">
                        <div class="rates-info active"><span class="text">1кг
                                = $4.2</span><img class="icon-img" src="/img/plane.905a43fa.svg" alt="plane"
                                style="display: none;"><img class="icon-img" src="/img/truck.4b9223f9.svg" alt="truck">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="mt80">
        <div class="branches-kz"><span class="branches-title">Наши филиалы по
                Казахстану</span>
            <div class="branch-page">
                <div class="ant-carousel slide-branches">
                    <div class="slick-slider slick-initialized" dir="ltr">
                        <div class="slick-list">
                            <div class="slick-track"
                                style="opacity: 1; transform: translate3d(-1600px, 0px, 0px); width: 4400px;">
                                <div class="slick-slide slick-cloned" tabindex="-1" data-index="-3" aria-hidden="true"
                                    style="width: 400px;">
                                    <div>
                                        <div class="tab-item" tabindex="-1" style="width: 100%; display: inline-block;">
                                            <div class="tab-content">
                                                <div class="city-name">Астана қаласы</div>
                                                <div class="box phone-box">
                                                    <div class="left-image"><img src="/img/phone_android.2d4112bf.svg"
                                                            alt="phone"></div>
                                                    <div class="phones">
                                                        <div class="phone">87076801688</div>
                                                    </div>
                                                </div>
                                                <div class="box worktime-box">
                                                    <div class="left-image"><img src="/img/watch_inactive.b8730e5b.svg"
                                                            alt="watch"></div>
                                                    <div class="worktime">
                                                        <p>10:00 - 20:00</p>
                                                        <p>Демалыссыз</p>
                                                    </div>
                                                </div>
                                                <div class="box price-box">
                                                    <div class="left-image"><img src="/img/payments.a99696cf.svg"
                                                            alt="money"></div>
                                                    <div class="price-for-country">
                                                        <div class="price">
                                                            <p>Из Китая до филиалов</p>
                                                            <p>- Standart 4.2$ / 1кг</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box address-box">
                                                    <div class="left-image"><img src="/img/location_on.83197aa2.svg"
                                                            alt="location"></div>
                                                    <div class="branch-address">
                                                        <div class="address-item">
                                                            <div class="location">Алиби
                                                                Жангельдин, 42</div>
                                                            <div class="city">Ажар</div>
                                                            <div class="links"><a class="link"><img
                                                                        src="/img/gis.e7cd5dde.svg" alt="2gis"><span
                                                                        class="text-map">2gis</span></a><a
                                                                    class="link"><img src="/img/yandex.46d1d013.svg"
                                                                        alt="yandex"><span
                                                                        class="text-map">Яндекс.Карты</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slick-slide slick-cloned" tabindex="-1" data-index="-2" aria-hidden="true"
                                    style="width: 400px;">
                                    <div>
                                        <div class="tab-item" tabindex="-1" style="width: 100%; display: inline-block;">
                                            <div class="tab-content">
                                                <div class="city-name">Астана қаласы</div>
                                                <div class="box phone-box">
                                                    <div class="left-image"><img src="/img/phone_android.2d4112bf.svg"
                                                            alt="phone"></div>
                                                    <div class="phones">
                                                        <div class="phone">87077421688</div>
                                                    </div>
                                                </div>
                                                <div class="box worktime-box">
                                                    <div class="left-image"><img src="/img/watch_inactive.b8730e5b.svg"
                                                            alt="watch"></div>
                                                    <div class="worktime">
                                                        <p>10:00 - 20:00</p>
                                                        <p>Демалыссыз</p>
                                                    </div>
                                                </div>
                                                <div class="box price-box">
                                                    <div class="left-image"><img src="/img/payments.a99696cf.svg"
                                                            alt="money"></div>
                                                    <div class="price-for-country">
                                                        <div class="price">
                                                            <p>Из Китая до филиалов</p>
                                                            <p>- Standart 4.2$ / 1кг</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box address-box">
                                                    <div class="left-image"><img src="/img/location_on.83197aa2.svg"
                                                            alt="location"></div>
                                                    <div class="branch-address">
                                                        <div class="address-item">
                                                            <div class="location">Сакен Сейфуллин
                                                                4а</div>
                                                            <div class="city">Сарыарқа ауданы
                                                            </div>
                                                            <div class="links"><a class="link"><img
                                                                        src="/img/gis.e7cd5dde.svg" alt="2gis"><span
                                                                        class="text-map">2gis</span></a><a
                                                                    class="link"><img src="/img/yandex.46d1d013.svg"
                                                                        alt="yandex"><span
                                                                        class="text-map">Яндекс.Карты</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><button class="button branches-btn">Посмотреть все филиалы</button>
            </div>
        </div>
    </div> -->
    <!-- <div class="mt80">
        <div class="pinduo">
            <div class="pinduo-img"><img src="/img/pinDuoDuoImg.e2cd3375.png" alt="pin duo duo"></div>
            <div class="pinduo-info">
                <div class="pinduo-janaPost">
                    <div class="pinduo-logo"><img src="/img/pinDuoDuoLogo.f2474f31.png" alt="pinduoduo logo"></div>
                    <div class="jana-logo"><img src="/img/jana-white-logo.92067af3.svg" alt="jana post logo"></div>
                </div><span class="text">Мы официальный партнер Pinduoduo</span>
                <div class="janaPost-info">
                    <div class="janaPost-infoBlock"><span class="janaPost-title">Более 14м</span><span
                            class="janaPost-subTitle">товаров было поставлено</span></div>
                    <div class="janaPost-infoBlock"><span class="janaPost-title">7+ годовой</span><span
                            class="janaPost-subTitle">транспортный опыт</span></div>
                    <div class="janaPost-infoBlock"><span class="janaPost-title">87 филиал</span><span
                            class="janaPost-subTitle">в
                            Казахстане</span></div>
                    <div class="janaPost-infoBlock"><span class="janaPost-title">JAŃA POST</span><span
                            class="janaPost-subTitle">Систематическое применение</span></div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="mt80">
        <div class="janaPost-teamInfo">
            <div class="janaPos-team"><span class="janaPos-title">Команда JAŃA
                    POST</span>
                <div class="descr"><span class="descr-text" style="white-space: break-spaces;">Компания JAŃA POST
                        Заказанный вами товар будет надежно доставлен по ближайшему к вам адресу. С помощью
                        специального приложения вы сможете полностью отслеживать товар, видеть, куда приходит ваш
                        товар и его вес. Позволяет не только отслеживать товар, но и оплатить стоимость перевозки
                        через удобную платежную систему. Для удобства пользователей JanaPost доступен на китайском,
                        русском, казахском, английском и др. языках. предоставляет услуги на языках.</span></div>
                <div class="team-photo"><img src="/img/janaPostTeam.cf37d77a.png" alt="team"></div>
            </div>
            <div class="janaPost-info"><span class="janaPostInfo-title">Как
                    JAŃA POST упрощает транспортировку</span>
                <div class="janaPostInfo-block">
                    <p class="text-p">Зарегистрируйтесь и запустите аккаунт</p>
                    <p class="text-p">Покупайте товары в интернете и используйте адреса доставки
                    </p>
                    <p class="text-p">Оплачивайте доставку удобно и быстро</p>
                </div><button class="button login-btn">Зарегистрироваться</button>
            </div>
        </div>
    </div> -->
@endsection