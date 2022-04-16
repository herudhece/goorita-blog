@extends('admin.layouts.main')

@section('content')

<div class="card">
    <div class="card-header">
      <h4>{{ $title }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('admin/user') }}" method="POST">
            @csrf
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" class="form-control">
              </div>

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control">
              </div>

              <div class="form-group">
                <label for="password" class="d-block">Password</label>
                <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
              </div>

              <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection
