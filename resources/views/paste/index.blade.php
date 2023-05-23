@extends('layouts.main')

@section('content')
    <h4>Список моих паст</h4>
    <div class="list-group w-50">
        @foreach ($pastes as $paste)
            <a href="{{ route('pastes.show', $paste->url) }}" class="list-group-item list-group-item-action mb-3 fs-4">{{ $paste->title }}</a>
        @endforeach
    </div>
    {{ $pastes->links() }}
@endsection
