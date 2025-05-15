@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h3 class="mb-4">Resultados para: <em>{{ $query }}</em></h3>

    @if($news->count())
        @foreach($news as $item)
            <div class="mb-4 border-bottom pb-3">
                <h5>
                    <a href="{{ route('news.show', $item) }}">{{ $item->title }}</a>
                </h5>
                <p>{{ Str::limit($item->content, 150) }}</p>
            </div>
        @endforeach

        {{ $news->links() }}
    @else
        <p class="text-muted">Nenhuma notícia encontrada.</p>
    @endif
</div>
@endsection
