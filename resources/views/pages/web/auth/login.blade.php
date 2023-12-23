<x-auth-layout title="Login">
  <div class="wrap">
    <div class="container font">
      <style>
        .font{
          font-family: 'Dancing Script', cursive;
          font-family: 'Mulish', sans-serif;
          font-family: 'Poppins', sans-serif;
        }
      </style>
      <h1>Selamat Datang</h1>
      <h1>Di Kelompok Maduma Tani</h1>
      <img src="images/Logo MadumaTani.png" width="150px" height="100px" style="display:block; margin:auto;"><br>
      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center; color:rgb(255, 8, 8)">
        {{ session('loginError') }}
      </div>
      @endif
      <form action="{{ route('auth.login') }}" method="post">
        @csrf
        <table>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="email" name="email" autocomplete="off">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </td>
          </tr>
          <tr>
            <td>Kata Sandi</td>
            <td>:</td>
            <td><input type="password" name="password" autocomplete="off">
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </td>
          </tr>
          <tr>
            <style>
              .center{
                display: flex;
                justify-content:center;
                margin:4px 0 2px 0;
              }
            </style>
            <td colspan="3">
              <div class="center">
                  <button style="background-color: #B0E0E6">Masuk</button>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="3" style="text-align: center">
              <p class="login-daftar-text">Belum Memiliki Akun?<a href="{{ url('/auth/register') }}">Daftar Disini</a></p>
            </td>
          </tr> 
        </table>
      </form>
    </div>
  </div>
</x-auth-layout>