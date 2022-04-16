@extends('layouts.main')
@section('content')

<div class="row">
    @foreach ($berita->skip(1) as $item)
    <div class="col-lg-4">
        <!-- berita post-->
        <div class="card mb-4">
            <a href="/berita/{{ $item->slug }}"><img class="card-img-top" src="{{ asset('berita-images/' . $item->image) }}" alt="..." /></a>
            <div class="card-body">
                <div class="small text-muted">{{ $item->created_at->diffForHumans() }}</div>
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
   
@endsection