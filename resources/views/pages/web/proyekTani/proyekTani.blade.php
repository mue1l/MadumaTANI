<x-web-layout title="Proyek Tani">
    <div class="breadcrumb-area text-center shadow dark-hard bg-fixed text-light" style="background-image: url('{{asset('images/Bg5.jpeg')}}')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <h1>Maduma Tani</h1>
            <ul class="breadcrumb">
              <li><a href="{{ url('/dashboard') }}"><i class="fas fa-home"></i>Beranda</a></li>
              <li class="active">Tani</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  
    <div class="blog-area full-blog blog-standard full-blog grid-colum default-padding">
      <div class="container">
        <div class="row justify-content-center">
          <div class="my-5">
            <div class="error-box">
              <div class="search">
                <div class="input-group">
                  <form action="#">
                    <input type="text" placeholder="Search" class="form-control" name="search" autocomplete="off" value="{{ request()->search }}">
                    <button type="submit">
                      <i class="fas fa-search"></i>
                    </button>  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
          <div class="blog-items">
            <div class="blog-content">
              <div class="blog-item-box">
                <div class="row">
                  <div class="container">
                    @if(Auth::User()->role=="admin")
                    <a class="btn circle btn-gray border btn-md btn" href="{{ route('proyekTani.create') }}">Tambah</a><br><br>
                    @endif
                    @foreach($proyekTani as $item)
                    <div class="card mb-3">
                      <div class="row ">
                        <div class="col-md-5">
                          <img src="{{ asset('asset/gambar/'.$item->gambar) }}" alt="{{ $item->judul }}" width="100%" height="234">
                        </div>
                        <div class="col-md-7">
                          <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="abc card-text">
                              {!! Str::limit($item->deskripsi,200) !!}
                            </p>
                            @if(Auth::User()->role=="admin")
                            <a class="btn circle btn-gray border btn-md" href="{{ route('proyekTani.edit',$item->id) }}">Edit</a>
                            <form action="{{ route('proyekTani.destroy',$item->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn circle btn-gray border btn-md">Hapus</button>
                            </form>
                            <a class="btn circle btn-gray border btn-md" href="{{ route('proyekTani.show',$item->id) }}">Selengkapnya</a>
                            @else
                            <a class="btn circle btn-gray border btn-md" href="{{ route('proyekTani.show',$item->id) }}">Selengkapnya</a>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <div class="text-center">
                      {{ $proyekTani->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</x-web-layout>