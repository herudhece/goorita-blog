@extends('layouts.main')
@section('content')
<div class = "container">
    <div class = "blog-content">
    @foreach ($berita as $item)
      <!-- item -->
      <div class = "blog-item">
        <div class = "blog-img">
          <img src = "{{ asset('berita-images/' . $item->image) }}" alt = "">
          <span><i class = "far fa-heart"></i></span>
        </div>
        <div class = "blog-text">
          <span>{{ $item->created_at->diffForHumans() }}</span>
          <h2>{{ $item->title }}</h2>
          <p>{!! $item->short_description !!}</p>
          <a href = "/blog/{{ $item->slug }}">Read More</a>
        </div>
      </div>
      <!-- end of item -->
      @endforeach
    </div>
    <div class="pro-pagination-style text-center mt-25">
        @if ($blog->hasPages())
            @if ($blog->lastPage() > 1)
            <ul>
                <li class="{{ ($blog->currentPage() == 1) ? ' active' : '' }}">
                    <a href="{{ $blog->url(1) }}" class="fa fa-angle-double-left"></a>
                </li>
                @for ($i = 1; $i <= $blog->lastPage(); $i++)
                    <li >
                        <a class="{{ ($blog->currentPage() == $i) ? 'active' : '' }}" href="{{ $blog->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="{{ ($blog->currentPage() == $blog->lastPage()) ? ' disabled' : '' }}">
                    <a href="{{ $blog->url($blog->currentPage()+1) }}" class="fa fa-angle-double-right"></a>
                </li>
            </ul>
            @endif
        @endif
    </div>
  </div>
@endsection