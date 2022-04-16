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
                <td>{{ $model->title }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{ $model->slug }}</td>
            </tr>  
            <tr>
                <th>Image</th>
                <td><img src="{{ asset('berita-images/' . $model->image) }}"></td>
            </tr>  
            <tr>
                <th>Deskripsi</th>
                <td>{!! $model->description !!}</td>
            </tr>

            <tr>
                <th>Publish Date</th>
                <td>{{date('d-m-Y', strtotime($model->published_date)) }}</td>
            </tr>
            
        </tbody>
    </table>
      </div>
    </div>
    
  </div>
@endsection