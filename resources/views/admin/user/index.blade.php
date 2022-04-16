@extends('admin.layouts.main')

@section('content')
      <div class="section-header">
        <h1>{{$title}}</h1>
      </div>

      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{ session('success') }}
        </div>
      </div>
      @endif

      <div class="section-body">

        <div class="card">
            <div class="card-header">
              <div class="buttons">
                <a href="{{ url('/admin/user/create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Tambah User</a>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($model as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                      <a href="/admin/user/{{ $item->id }}" class="btn btn-secondary">View</a>
                      <a href="/admin/user/{{ $item->id }}/edit" class="btn btn-primary">Update</a>
                      <form action="/admin/user/{{ $item->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus data?')">Delete</button>
                      </form>
                    </td>
                    </tr>
                    @endforeach

                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                @if ($model->hasPages())
                    @if ($model->lastPage() > 1)
                      <ul class="pagination mb-0">
                        <li class="page-item">
                          <a href="{{ $model->url(1) }}" class="page-link"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        @for ($i = 1; $i <= $model->lastPage(); $i++)
                        <li class="page-item {{ ($model->currentPage() == $i) ? 'active' : '' }}">
                          <a class="page-link" href="{{ $model->url($i) }}">{{ $i }}</a>
                        </li>
                        @endfor
                        <li class="{{ ($model->currentPage() == $model->lastPage()) ? ' disabled' : '' }}">
                          <a href="{{ $model->url($model->currentPage()+1) }}" class="page-link"><i class="fas fa-chevron-right"></i></a>
                        </li>
                        </ul>
                    @endif
                  @endif
              </nav>
            </div>
          </div>
      </div>
@endsection
