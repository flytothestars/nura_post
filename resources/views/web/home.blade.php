@extends('layouts.app')
@section('title', 'Главная страница')
@section('content')
<div class="home-welcome" style="
background: linear-gradient(180deg, rgba(0, 0, 0, .24), rgba(0, 0, 0, .64)), url('{{ asset('images/welcome.' . $fileExtension_banner) }}');">
    <div class="welcome-block">
        <p class="text-welcome">Купите онлайн товар из границы и получите доставку!</p>
        <div class="observation-input">
            <div class="input-block">
                <label for="observation" class="label">Отслеживайте свой
                    товар</label>
                <input placeholder="Введите трек-код" class="input" type="text" name="observation">
            </div>
            <button id="send" class="observation-btn btn btn-warning">Следить</button>
        </div>
    </div>
</div>
<div class="mtop">
    <div class="rates-block"><span class="block-title">У нас
            лучшие тарифы.</span>
        <div class="rates-calculator">
            <div class="rates-price">
                <span class="text-title">Цена за доставку&nbsp;</span>
                <span class="text-price"><span>$</span><span id="range-result">0</span></span>
            </div>
            <div class="rates-wrapper">
                <div class="rates-range">
                    <label class="label" for="product-weight">Вес продукта</label>
                    <div class="range-container">
                        <span class="range-value" id="range-display">0</span>
                        <input type="range" min="0" step="0.1" max="100" value="0" class="product-inputRange"
                            id="range-slider">
                    </div>
                </div>
                <div class="rates-type">
                    <div class="rates-info active">
                        <span class="text-info-kg">1кг = ${{$settingData['per_kg']}}</span>
                        <img class="icon-img" src="{{asset('images/truck.svg')}}" alt="truck">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(count($filials) != 0)
<div class="mtop">
    <div class="branches-kz">
        <span class="branches-title">Наши филиалы</span>
        <div class="branch-page">
            <div class="container-slider">
                @if(count($filials) <= 3) <div class="itc-slider" data-slider="itc-slider" data-loop="false"
                    data-autoplay="false">
                    @else
                    <div class="itc-slider" data-slider="itc-slider" data-loop="true" data-autoplay="true"
                        data-interval="5000">
                        @endif
                        <div class="itc-slider-wrapper">
                            <div class="itc-slider-items">
                                @foreach($filials as $filial)
                                <div class="itc-slider-item">
                                    <div class="tab-item">
                                        <div class="tab-content">
                                            <div class="city-name">{{$filial->city->name}}</div>
                                            @if($filial->phone)
                                            <div class="box phone-box">
                                                <div class="left-image"><img src="{{asset('images/phone.svg')}}"
                                                        alt="phone"></div>
                                                <div class="phones">
                                                    <div class="phone">{{$filial->phone}}</div>
                                                </div>
                                            </div>
                                            @endif
                                            @if($filial->start_time)
                                            <div class="box worktime-box">
                                                <div class="left-image"><img src="{{asset('images/watch.svg')}}"
                                                        alt="watch"></div>
                                                <div class="worktime">
                                                    <p>{{$filial->start_time}} - {{$filial->end_time}}</p>
                                                    <p></p>
                                                </div>
                                            </div>
                                            @endif
                                            @if($filial->exchange_rates)
                                            <div class="box price-box">
                                                <div class="left-image">
                                                    <img src="{{asset('images/money.svg')}}" alt="money">
                                                </div>
                                                <div class="price-for-country">
                                                    <div class="price">
                                                        <p>Из Китая до филиалов</p>
                                                        <p>- {{$filial->exchange_rates}}$ / 1кг</p><!---->
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if($filial->twogis_link)
                                            <div class="box address-box">
                                                <div class="left-image">
                                                    <img src="{{asset('images/location_on.svg')}}" alt="location">
                                                </div>
                                                <div class="branch-address">
                                                    <div class="address-item">
                                                        <div class="location">{{$filial->address}}</div>
                                                        <div class="city"></div>
                                                        <div class="links">
                                                            <a href="{{$filial->twogis_link}}" class="link">
                                                                <img src="{{asset('images/twogis.svg')}}" alt="2gis">
                                                                <span class="text-map">2gis</span></a>
                                                            <a class="link">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button class="itc-slider-btn itc-slider-btn-prev"></button>
                        <button class="itc-slider-btn itc-slider-btn-next"></button>
                    </div>
            </div>


            <!-- <button class="button branches-btn">Посмотреть все филиалы</button> -->
        </div>
    </div>
</div>
@endif


<!-- <div class="my-2">
    <div class="block-header align-items-center d-flex">
        <div class="header flex-grow-0 ">Полезные информации</div>
        <div class="block-header__line px-4 flex-grow-1">
            <hr>
        </div>
        <div class="block-header__show-all flex-grow-0 "><a href="{{route('news')}}">Показать все</a></div>
    </div>
</div>
<div class=" mb-5 pb-4">
    <div class="d-lg-block d-none">

        <div class="news-block">
            <div class="row">
                <div class="col-6 static align-items-stretch d-flex">
                    <a href="#" class="card news-block__card">
                        <img src="#"
                            class="card-img-top " alt="">
                        <div class="card-body d-flex pb-2 flex-column">
                            <h5 class="card-title">Header</h5>
                            <p class="card-text">Lead</p>
                            <div class="card-text mt-auto pb-1 date">
                                Create date    
                            </div>
                            <div class="card-text mt-auto pb-1 date"></div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <div class="row ">
                        <div class="col-6 d-flex flex-column">
                            <a href="#"
                                class="card news-block__card h-100 mb-3">
                                <img src="#"
                                    class="card-img-top" alt="">
                                <div class="card-body pb-2 d-flex flex-column">
                                    <h5 class="card-title mb-0">Header</h5>
                                    <div class="card-text pb-1 pt-1 mt-auto date">
                                        Created date
                                    </div>
                                    <div class="card-text pb-1 pt-1 mt-auto date"></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 d-flex flex-column">
                            <a href="#"
                                class="card news-block__card mb-3">
                                <img src="#"
                                    class="card-img-top" alt="">
                                <div class="card-body pb-2 d-flex flex-column">
                                    <h5 class="card-title mb-0">Header</h5>
                                    <div class="card-text mt-auto pb-1 pt-1 date">
                                    Created date    
                                    </div>
                                    <div class="card-text mt-auto pb-1 pt-1 date"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="#"
                                class="card news-block__card news-block__card-last">
                                <div class="card-body pb-2 d-flex flex-column">
                                    <h5 class="card-title mb-0">Header</h5>
                                    <div class="card-text pb-1 mt-2 date">
                                        Created date    
                                    </div>
                                    <div class="card-text pb-1 mt-2 date"></div>
                                </div>
                                <div class="card-img-wrapper">
                                    <img src="#"
                                        class="card-img-top" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-lg-none d-block">
        <div class="newsBlock-carousel owl-carousel owl-theme carousel">
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


<!-- Модальное окно для отображения статуса -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Статус трек-кода</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center" id="statusModalBody">

                </div>
                <!-- Сюда будет вставлен статус после получения ответа от сервера -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

@endsection