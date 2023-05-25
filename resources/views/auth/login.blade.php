@extends('layouts.main')

@section('content')
<div class="text-center mt-3">
    <h4>Авторизация</h4>
    <form action="{{ route('custom-login') }}" method="post" class="form">
        @csrf
        <div class="mb-3">
            <label for="name">Логин</label>
            <input class="form-controll bg-white" type="login" name="name" placeholder="Логин" value="{{ old('name') ? old('name') : null }}">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password">Пароль</label>
            <input class="form-controll bg-white" type="password" name="password" placeholder="Пароль">
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Войти</button>
    </form>

    @error('ban')
        <p class="text-danger">{{ $message }}</p>
    @enderror

</div>
@endsection
