@extends('admin.layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
      <h4>{{ $title }}</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-md">
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