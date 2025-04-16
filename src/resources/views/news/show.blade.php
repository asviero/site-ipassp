@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>{{ $news->title }}</h1>
    <img src="{{ $news->getFirstMediaUrl('default') }}" class="img-fluid mb-4" alt="{{ $news->title }}">
    <p>{{ $news->content }}</p>
</div>
@endsection
