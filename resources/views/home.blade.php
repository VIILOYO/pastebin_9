@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Сразу создать пасту</h5>
                <p class="card-text">Вы можете сразу создать пасту, но у вас не будет возможности выбрать private доступ к пасте</p>
                <a href="{{ route('pastes.create') }}" class="btn btn-primary">Создать</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Создать аккаунт</h5>
                <p class="card-text">Создать аккаунт и получить доступ ко всем фишкам сайта (приватная паста Kappa)</p>
                <a href="{{ route('registration') }}" class="btn btn-primary">Регистрация</a>
            </div>
        </div>
    </div>
</div>
@endsection