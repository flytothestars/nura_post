@extends('layouts.app')
@section('title', 'Полезные информации')
@section('content')
<div class="container news-list pt-5">
    <div class="row">
        <div class="col-12">
            Полезные
        </div>
    </div>
    <div class="block-header align-items-center d-md-flex mb-4">
        <div class="header flex-grow-0 w-25">Title</div>
    </div>
    <div class="row filters">
    </div>
    <div class="row">
        <div class="col-12 col-sm-4 newsItem">
            <a href="#" class="card news-block__card mb-3 h-100 border-0">
                <img src="#"
                    class="card-img-top" alt="">
                <div class="card-body ">

                    <div class="card__item news-item">
                        <p class="card-text "><small class="text-green">category</small></p>
                        <p class="card-text float-end ms-auto text-muted">
                            created date
                        </p>

                    </div>
                    <div class="card__item">
                        <div class="card-title mb-4">Header</div>
                    </div>
                    <div class="card__item">
                        <p class="card-text">lead</p>
                    </div>
                    <div class="card__item mt-auto align-items-end">
                        <span class="text-blue text-decoration-none">
                            <p class="font-md font-bold">read</p>
                        </span>
                    </div>

                </div>

            </a>
            

        </div>
    </div>


</div>

@endsection