@extends('admin.layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h4>Update Blog</h4>
    </div>
    <div class="card-body">
        <form action="/admin/berita/{{ $model->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="example: Masukan title" value="{{ $model->title }}">
              </div>
              
              <div class="form-group">
                <label for="image">File</label>
                @if ($model->image)
                <img src="{{ asset('berita-images/' . $model->image) }}" class="img-preview d-block w-100 mb-3 col-sm-5">
                @endif
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImg()" value="{{  $model->image }}">
                @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              

              <div class="form-group">
                <label for="description">Content</label>
                <input id="description" type="hidden" name="description" value="{{ $model->description }}">
                <trix-editor input="description"></trix-editor>
              </div>

              <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>


<script>
  function previewImg() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview')

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection