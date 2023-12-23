<x-auth-layout title="Register">
  <div class="wrap">
    <div class="container font">
      <style>
        .font{
          font-family: 'Dancing Script', cursive;
          font-family: 'Mulish', sans-serif;
          font-family: 'Poppins', sans-serif;
        }
      </style>
      <h1>Daftar Disini</h1>
      <img src="{{ asset('images/Logo MadumaTani.png') }}" width="150px" height="100px" style="display:block; margin:auto;"><br>
      <form action="{{ route('auth.register') }}" method="post">
        @csrf
        <table>
          <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><input type="text" name="name" autocomplete="off">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat"></textarea>
              @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </td>
          </tr>
          <tr>
            <td>Username</td>
            <td>:</td>
            <td><input type="text" name="username" autocomplete="off">
              @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </td>
          </tr>
          <tr>
            <td>No.HP</td>
            <td>:</td>
            <td><input type="text" name="nomorhp" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off">
              @error('nomorhp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </td>
          </tr>
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
                <button type="submit" name="Daftar">Daftar</button>
              </div>

              <tr>
                <td colspan="3" style="text-align: center">
                  <p class="login-daftar-text">Sudah mempunyai akun? <a href="{{ url('/') }}">Masuk</a></p>
                </td>
              </tr>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</x-auth-layout>