<x-web-layout title="Create">
    <div class="breadcrumb-area text-center shadow dark-hard bg-fixed text-light" style="background-image: url('{{asset('images/Bg5.jpeg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Maduma Tani</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/proyekTani') }}"><i class="fas fa-home"></i> Proyek</a></li>
                        <li class="active">Tani</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-content">
                    <h2 class="text-center">Tambah Informasi Proyek Tani</h2>
                    <form action="{{ route('proyekTani.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Nama Topik</label>
                            <div class="col-sm-10">
                              <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Namatopik" autocomplete="off">
                            </div>
                        </div>
                        @error('judul')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"name="gambar">  
                            </div>                                                         
                        </div>
                        @error('gambar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="summernote" class="col-sm-2 col-form-label">Narasi</label>
                            <div class="col-sm-10">
                              <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="summernote" placeholder="Narasi" rows="15"></textarea>
                            </div>
                        </div>
                        @error('deskripsi')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row justify-content-center my-5">
                            <button type="submit" class="px-5 btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#summernote').summernote({
          placeholder: 'Isi...',
          tabsize: 2,
          height: 500
        });
    </script>
</x-web-layout>