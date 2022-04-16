@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- Featured blog post-->
        @if ($berita->count())
        <div class="card mb-4">
            <a href="/berita/{{ $berita[0]->slug }}"><img class="card-img-top" src="{{ asset('berita-images/' . $berita[0]->image) }}" alt="..." /></a>
            <div class="card-body">
                <div class="small text-muted">{{ $berita[0]->created_at->diffForHumans() }} , by {{ $berita[0]->user->name }}</div>
                <h2 class="card-title">{{ $berita[0]->title }}</h2>
                <p class="card-text">{!! $berita[0]->short_description !!}</p>
                <a class="btn btn-primary" href="/berita/{{ $berita[0]->slug }}">Read more →</a>
            </div>
        </div>
        @endif
        
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            @foreach ($berita->skip(1) as $item)
            <div class="col-lg-4">
                <!-- Blog post-->
                <div class="card mb-4">
                    <a href="/berita/{{ $item->slug }}"><img class="card-img-top" src="{{ asset('berita-images/' . $item->image) }}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $item->created_at->diffForHumans() }} , by {{ $item->user->name }}</div>
                        <h2 class="card-title h4">{{ $item->title }}</h2>
                        <p class="card-text">{!! $item->short_description !!}</p>
                        <a class="btn btn-primary" href="/berita/{{ $item->slug }}">Read more →</a>
                    </div>
                </div>                
            </div>
            @endforeach
        </div>
        <!-- Pagination-->
        <nav aria-label="Pagination">
            <hr class="my-0" />
            @if ($berita->hasPages())
                @if ($berita->lastPage() > 1)
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item {{ ($berita->currentPage() == 1) ? 'disabled' : '' }}">
                        <a href="{{ $berita->url(1) }}" class="page-link">Prev</a>
                    </li>
                    @for ($i = 1; $i <= $berita->lastPage(); $i++)
                        <li class="page-item {{ ($berita->currentPage() == $i) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $berita->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ ($berita->currentPage() == $berita->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $berita->url($berita->currentPage()+1) }}" class="page-link">Next</a>
                    </li>
                </ul>
                @endif
            @endif

        </nav>
    </div>
</div>
@endsection