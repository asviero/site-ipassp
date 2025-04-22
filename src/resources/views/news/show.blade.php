@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h1 class="card-title mb-4 text-center">{{ $news->title }}</h1>

                    @if($news->getFirstMediaUrl('default'))
                    <img src="{{ $news->getFirstMediaUrl('default') }}"
                        class="img-fluid rounded mb-4 d-block mx-auto"
                        alt="{{ $news->title }}"
                        style="max-height: 500px; object-fit: cover;">
                    @endif

                    <div class="card-text fs-5">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection