@extends('admin.layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
      <h4>{{ $title }}</h4>
    </div>
    <div class="card-body">
      <a href="/admin/user" class="btn btn-secondary">Back</a>
      <a href="/admin/user/{{ $model->id }}/edit" class="btn btn-primary">Update</a>
      <form action="/admin/user/{{ $model->id }}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus data?')">Delete</button>
      </form>
      <div class="table-responsive">
        <table class="table table-bordered table-md mt-3">
          <tbody>
            <tr>
                <th>Nama</th>
                <td>{{$model->name}}</td>
            </tr>
            <tr>
                <th>Username</th>
                <td>{{ $model->username }}</td>
            </tr>  
            <tr>
                <th>Email</th>
                <td>{{ $model->email }}</td>
            </tr>   
        </tbody>
    </table>
      </div>
    </div>
    
  </div>
@endsection