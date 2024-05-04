@extends('layouts.auth')
@section('title', 'Register')
@section('content')
  <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
    style="background: url({{ asset('assets/images/big/auth-bg.jpg') }}) no-repeat center center;">
    <div class="auth-box row">
      <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{ asset('assets/images/big/3.jpg') }});">
      </div>
      <div class="col-lg-5 col-md-7 bg-white">
        <div class="p-3">
          <div class="text-center">
            <img src="{{ asset('assets/images/big/icon.png') }}" alt="wrapkit" />
          </div>
          <h2 class="mt-3 text-center">Register</h2>
          <p class="text-center">Masukkan alamat username, email dan password untuk mendaftar</p>
          <form class="mt-4" action="{{ route('signup') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group mb-3">
                  <label class="form-label text-dark" for="name">Username</label>
                  <input class="form-control" id="name" name="name" type="text"
                    placeholder="masukkan username anda" />
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group mb-3">
                  <label class="form-label text-dark" for="email">Email</label>
                  <input class="form-control" id="email" name="email" type="text"
                    placeholder="masukkan email anda" />
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group mb-3">
                  <label class="form-label text-dark" for="password">Password</label>
                  <input class="form-control" id="password" name="password" type="password"
                    placeholder="masukkan password anda" />
                </div>
              </div>
              <div class="col-lg-12 text-center">
                <button type="submit" class="btn w-100 btn-dark">
                  Register
                </button>
              </div>
              <div class="col-lg-12 text-center mt-5">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-danger">Login</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
