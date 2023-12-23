<header id="home">
    <nav class="navbar navbar-default navbar-sticky bootsnav">
        <div class="container">
            <div class="attr-nav inc-border">
                <ul>
                    <li class="nav-item dropdown">
                        @php
                            $notif = \App\Models\Peminjaman::where('user_id',auth()->user()->id)->get(); 
                            $count =0;
                        @endphp
                        @if(Auth::User()->role=="user")
                        <a href="{{ url('/dashboard') }}" class="dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bell" style="font-size: 2.5rem;"></i>
                        </a>
                        @endif
                        <style>
                            .dropdown-menu1{
                                width: 300px !important;
                                /* height: 400px !important; */
                            }
                            .ff {
                                font-size: 13px;
                                font-weight: 2px;
                                line-height:1.5;
                            }
                            .anyClass {
                                max-height:300px;
                                overflow-y: scroll;
                            }
                        </style>
                        <div class="dropdown-menu dropdown-menu1 p-0 anyClass" style="width: 200px">
                            <div class="bg-primary text-white p-1">
                                Notifikasi
                            </div>
                            @foreach($notif as $item)
                            <div class="ff p-1">
                                {{ $item->pemberitahuan }}
                            </div>
                            <hr>
                            @endforeach
                        </div>  
                    </li>
                    <li class="nav-item dropdown">
                        @if(Auth::User())
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                <ul class="dropdown-menu cart-list">
                                    <li>
                                        {{ auth()->user()->name }}
                                        <h6>Terimakasih Telah Berkunjung</h6>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="" style="border-radius: 10%;width:100px;height:35px">Keluar</button> 
                                        </form>
                                    </li>
                                </ul>
                            </svg>
                        </a>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/auth') }}">Login</a>
                        </li>
                        @endif
                    </li>
                </ul>
            </div>        
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="{{asset('images/Logo MadumaTani.PNG')}}" width="200px" height="200px" class="logo" alt="Logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                    <li>
                        <a href="{{ url('/dashboard') }}" class="dropdown-toggle" data-toggle="dropdown">Beranda</a>
                    </li>
                    <li><a href="{{ route('edukasi.index') }}">Edukasi</a></li>
                    @if(Auth::User()->role=="admin")
                    <li><a href="{{ url('/pinjam') }}">Peminjaman</a>
                    @endif
                    <li><a href="{{ url('/barang') }}">Barang</a></li>
                    <li><a href="{{ route('proyekTani.index') }}">Proyek Tani</a></li>
                    <li><a href="{{ url('/contact') }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>