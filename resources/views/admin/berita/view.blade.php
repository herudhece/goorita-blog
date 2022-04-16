@extends('admin.layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h4>Detail Blog</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-md">
          <tbody>
            <tr>
                <th>Title</th>
                <td>{{ $berita->title }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{ $berita->slug }}</td>
            </tr>  
            <tr>
                <th>Image</th>
                <td><img src="{{ asset('berita-images/' . $berita->image) }}"></td>
            </tr>  
            <tr>
                <th>Deskripsi</th>
                <td>{!! $berita->description !!}</td>
            </tr>

            <tr>
                <th>Publish Date</th>
                <td>{{date('d-m-Y', strtotime($berita->published_date)) }}</td>
            </tr>
            
        </tbody>
    </table>
      </div>
    </div>
    
  </div>
@endsection