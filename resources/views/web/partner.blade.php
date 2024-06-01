@extends('layouts.app')
@section('title', 'Стать партнером')
@section('content')
<div class="first mb-4">
    <div class="info">
        <h1> {{$settingData['name_company']}} <br> стать партнером</h1>
        <h3>Через развитие раздела у вас есть возможность развить свой бизнес и получить отличный
            опыт работы вместе с нами в партнерстве</h3>
        <button class="ant-btn ant-btn-primary partner-button" type="button" data-bs-toggle="modal"
            data-bs-target="#formPartner">
            <span>Стать партнером</span>
        </button>
    </div>
</div>
<div style="margin: 20px 0px; padding: 10px; border: 2px solid blue; border-radius: 16px; align-items: center;">
    <h3 style="font-weight: 700; margin: 0px;">Партнерство - это возможность использовать
        возможности компании {{$settingData['name_company']}} для беспрепятственного роста.</h3>
</div>
<div class="need">
    <div>
        <h2>Как стать партнером?</h2>
        <h3>Вы можете связаться с нами, заполнив заявку.</h3>
        <div style="background-color: white; margin: 20px 0px 120px; border-radius: 25px;">
            <h2>Требования к филиалу:</h2>
            <div style="text-align: left; list-style: circle; max-width: 700px; margin: auto;">
                <ul>
                    <li>Имеет ИП или ТОО;</li>
                    <li>Имеет личное или арендное место от 50 кв.м;</li>
                    <li>Находится на первой линии и расположен близко к жилой застройке;</li>
                    <li>Выполнение работ по адаптации под требования {{$settingData['name_company']}} компании внутри
                        раздела.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formPartner" tabindex="-1" aria-labelledby="formPartnerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formPartnerLabel">Заявка</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">ФИО</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Телефон</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="birthday" class="col-sm-2 col-form-label">Дата рождения</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="button" id="sendPartner" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </div>
</div>

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