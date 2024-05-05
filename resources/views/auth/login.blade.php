@extends('layouts.auth')
@section('title', 'Login')
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
          <h2 class="mt-3 text-center">Login</h2>
          <p class="text-center">Masukkan alamat email dan password untuk masuk ke dashboard</p>
          <form class="mt-4" action="{{ route('signin') }}" method="POST">
            @csrf
            <div class="row">
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
                  Login
                </button>
              </div>
              <div class="col-lg-12 text-center mt-5">
                <a href="{{ route('home') }}" class="text-primary">Kembali ke Beranda</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
