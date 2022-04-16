@extends('admin.layouts.main')

@section('content')

<div class="card">
    <div class="card-header">
      <h4>Create Berita</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('admin/berita') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="example: Masukan title">
                @error('title')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="image">File</label>
                <img class="img-preview d-block w-100 mb-3 col-sm-5">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImg()">
                @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              

              <div class="form-group">
                <label for="description">Description</label>
                <input id="description" class="@error('description') is-invalid @enderror" type="hidden" name="description">
                <trix-editor input="description"></trix-editor>
                @error('description')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
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
