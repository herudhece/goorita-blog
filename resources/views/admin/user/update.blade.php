@extends('admin.layouts.main')

@section('content')
    
<div class="card">
    <div class="card-header">
      <h4>{{ $title }}</h4>
    </div>
    <div class="card-body">
        <form action="/admin/user/{{ $model->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $model->name }}">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ $model->username }}">
              </div>
              <div class="form-group">
                <label for="email">email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $model->email }}">
              </div>

              <div class="form-group">
                <label for="password" class="d-block">Password</label>
                <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
              </div>
              
              <a href="/admin/user" class="btn btn-secondary">Back</a>
              <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection