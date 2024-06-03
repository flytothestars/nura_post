
<div class="h2 d-flex flex-column align-items-center">
    <div>
        <img class="rounded-circle" width="100" height="100" src="{{asset('images/nurapost_logo.jpg')}}">
    </div>
    <div class="mt-4">
        <p class="my-0 {{ auth()->check() ? 'd-none d-xl-block' : '' }}">
            {{ config('app.name') }}
            <small class="align-top opacity">{{ config('app.env') }}</small>
        </p>
    </div>
</div>