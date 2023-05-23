@extends('layouts.main')

@section('content')

    <form action="{{ route('pastes.store') }}" method="post" class="form">
        @csrf
        <div class="w-25 mb-2">
            <label for="language">Язык</label>
            <select class="form-select bg-white" name="language" id="language">
                <option value="text/javascript">JavaScript</option>
                <option value="xml">HTML</option>
                <option value="python">Python</option>
                <option value="css">CSS</option>
                <option value="pascal">Pascal</option>
                <option value="text/x-c++sr">C++</option>
                <option value="text/x-java">Java</option>
            </select>
            @error('language')
                {{ $message }}
            @enderror
        </div>

        <div class="w-25 mb-2">
            <label for="title">Название</label>
            <input class="form-control bg-white" type="text" name="title" placeholder="Название" value="{{ old('title') ? old('title') : null}}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-100 mb-2">
            <label for="text">Текст пасты</label>
            <textarea name="text" cols="100" rows="10" id="myTextarea">{{ old('text') ? old('text') : 'Введите свой текст'}}</textarea>
            @error('text')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-25 mb-2">
            <label for="expiration_time">Время жизни</label>
            <select class="form-select bg-white" name="expiration_time">
                <option value="1">10 минут</option>
                <option value="60">1 час</option>
                <option value="180">3 часа</option>
                <option value="1440">1 день</option>
                <option value="10080">1 неделя</option>
                <option value="43200">3 часа</option>
                <option value="0">без ограничения</option>
            </select>
            @error('expiration_time')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-25 mb-2">
            <label for="access_restriction">Доступ</label>
            <select class="form-select bg-white" name="access_restriction">
                @foreach( App\Enums\PasteEnum::cases() as $enum )
                    <option value="{{ $enum }}">{{ __('privacy.' . $enum->value)}}</option>
                @endforeach
            </select>
            @error('access_restriction')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>

    <script>
        'use strict';
        const selectElement = document.querySelector("#language");
        const myTextarea = document.getElementById('myTextarea');

        selectElement.addEventListener("change", (event) => {
            editor.setOption('mode', event.target.value);
        });

        let editor = CodeMirror.fromTextArea(myTextarea, {
            lineNumbers: true,
            mode: `text/javascript`,
        });
    </script>
@endsection
