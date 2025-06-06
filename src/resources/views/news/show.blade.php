@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="container py-4">
            @if($news->getFirstMediaUrl('default'))
                <img src="{{ $news->getFirstMediaUrl('default') }}"
                    class="img-fluid rounded mb-4 d-block mx-auto"
                    alt="{{ $news->title }}"
                    style="max-height: 500px; object-fit: cover;">
            @endif

            <h1 class="mb-4 text-center">{{ $news->title }}</h1>

            <div class="fs-5 text-justify">
                {!! $news->content !!}
            </div>
        </div>
    </div>
@endsection
