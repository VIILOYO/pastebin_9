@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        Название: {{ $paste->title }}
    </div>
    <div class="card-body">
        <div class="mb-0">
            <textarea class="form-control" name="text" id="myTextarea" cols="100" rows="10">{{ $paste->text }}</textarea>
            <p class="card-text">Язык:<small class="text-body-secondary" id="language">{{ $paste->language }}</small>
            @if (isset($paste->author))
                <small class="text-body-secondary"> | Автор: {{ $paste->author->name }}</small></p>
            @endif
        </div>
    </div>
</div>

<script>
    const myTextarea = document.getElementById('myTextarea');

    const editor = CodeMirror.fromTextArea(myTextarea, {
        mode: document.getElementById('language').textContent,
        readOnly: true,
    });
</script>
@endsection
