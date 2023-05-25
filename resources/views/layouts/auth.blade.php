@guest
    <p><a href="{{ route('login') }}">Вход</a> | <a href="{{ route('registration') }}">Регистрация</a></p>
@endguest

@auth
    <p> <a href="{{ route('pastes.users', auth()->user()->id) }}">{{ auth()->user()->name }}</a> | <a href="{{ route('signout') }}">Выход</a></p>
    <h4>Мои пасты</h4>
    @foreach ($personalPastes as $paste)
        <p><a href="{{ route('pastes.show', $paste->url) }}">{{ $paste->title }}</a></p>
    @endforeach
@endauth
