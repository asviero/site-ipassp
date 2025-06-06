@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Todas as Notícias</h1>

    @if($news->count())
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($news as $item)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                @if($item->getFirstMediaUrl('default'))
                <a href="{{ route('news.show', $item) }}" class="hover-zoom d-block">
                    <img src="{{ $item->getFirstMediaUrl('default') }}" class="card-img-top object-fit-cover"
                        style="height: 200px; object-fit: cover;" alt="{{ $item->title }}">
                </a>
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <a href="{{ route('news.show', $item) }}" class="text-decoration-none text-dark hover-fade">
                            {{ $item->title }}
                        </a>
                    </h5>
                    <p class="card-text">
                        {{ Str::limit(strip_tags(html_entity_decode($item->content)), 120) }}
                    </p>
                    <a href="{{ route('news.show', $item) }}" class="mt-auto btn btn-outline-primary btn-sm">
                        Leia mais
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="mt-5">
        {{ $news->links('pagination::bootstrap-5') }}
    </div>

    @else
        <p class="text-muted text-center">Nenhuma notícia cadastrada no momento.</p>
    @endif
</div>
@endsection
