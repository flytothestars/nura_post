<div class="container">
    <header class="px-3 py-2 text-bg-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <img class="bi me-2" width="70" height="50" role="img" aria-label="Bootstrap"
                        src="https://www.janapost.kz/img/janapost-header-logo.e4111809.svg">
                </a>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <div class="place-at-center nav-link">
                            <span class="icon place-at-center">
                                <span role="img" aria-label="shop" class="anticon anticon-shop"
                                    style="font-size: 16px; color: rgb(82, 96, 112);">
                                    <svg focusable="false" class="" data-icon="shop" width="1em" height="1em"
                                        fill="currentColor" aria-hidden="true" viewBox="64 64 896 896">
                                        <path
                                            d="M882 272.1V144c0-17.7-14.3-32-32-32H174c-17.7 0-32 14.3-32 32v128.1c-16.7 1-30 14.9-30 31.9v131.7a177 177 0 0014.4 70.4c4.3 10.2 9.6 19.8 15.6 28.9v345c0 17.6 14.3 32 32 32h676c17.7 0 32-14.3 32-32V535a175 175 0 0015.6-28.9c9.5-22.3 14.4-46 14.4-70.4V304c0-17-13.3-30.9-30-31.9zM214 184h596v88H214v-88zm362 656.1H448V736h128v104.1zm234 0H640V704c0-17.7-14.3-32-32-32H416c-17.7 0-32 14.3-32 32v136.1H214V597.9c2.9 1.4 5.9 2.8 9 4 22.3 9.4 46 14.1 70.4 14.1s48-4.7 70.4-14.1c13.8-5.8 26.8-13.2 38.7-22.1.2-.1.4-.1.6 0a180.4 180.4 0 0038.7 22.1c22.3 9.4 46 14.1 70.4 14.1 24.4 0 48-4.7 70.4-14.1 13.8-5.8 26.8-13.2 38.7-22.1.2-.1.4-.1.6 0a180.4 180.4 0 0038.7 22.1c22.3 9.4 46 14.1 70.4 14.1 24.4 0 48-4.7 70.4-14.1 3-1.3 6-2.6 9-4v242.2zm30-404.4c0 59.8-49 108.3-109.3 108.3-40.8 0-76.4-22.1-95.2-54.9-2.9-5-8.1-8.1-13.9-8.1h-.6c-5.7 0-11 3.1-13.9 8.1A109.24 109.24 0 01512 544c-40.7 0-76.2-22-95-54.7-3-5.1-8.4-8.3-14.3-8.3s-11.4 3.2-14.3 8.3a109.63 109.63 0 01-95.1 54.7C233 544 184 495.5 184 435.7v-91.2c0-.3.2-.5.5-.5h655c.3 0 .5.2.5.5v91.2z">
                                        </path>
                                    </svg>
                                </span>
                            </span>
                            <div>
                                <a href="{{route('partner')}}" style="color: black; text-decoration: none;">Откройте свой филиал</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="place-at-center nav-link">
                            <div class="icon place-at-center">
                                <img src="{{ asset('images/phone.svg')}}" alt="phone">
                            </div>
                            <div class="ms-3">
                                <div class="row contact-text">
                                    Контакт
                                </div>
                                <div class="row contact-phone">
                                    {{$settingData['phone']}}
                                </div>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </header>
</div>