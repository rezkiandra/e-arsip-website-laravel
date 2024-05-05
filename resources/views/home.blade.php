@extends('layouts.app')
@section('title', 'Beranda')
@push('styles')
  <style>
    .card:hover {
      cursor: pointer;
      transform: scale(.97);
      transition: 0.5s;
    }

    .card {
      transition: 0.5s;
    }

    .justify {
      text-align: justify;
    }

    .height {
      min-height: 60px;
    }
  </style>
@endpush
@section('content')
  <div class="page-breadcrumb border-bottom pb-2">
    <div class="row">
      <div class="col-6 align-self-center">
        <div class="d-flex d-lg-flex align-items-center justify-content-start">
          <a class="h3" href="{{ route('home') }}">
            <img src="{{ asset('assets/images/favicon.png') }}" alt="logo">
            <span class="text-dark text-uppercase h4">E-Arsip</span>
          </a>
        </div>
      </div>
      <div class="col-6 align-self-center">
        <div class="d-flex d-lg-flex align-items-center justify-content-end">
          <span class="text-dark text-uppercase h4">Website</span>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="d-flex flex-column align-items-center justify-content-center gap-1 mb-4 mt-4">
      <span class="text-uppercase text-dark h3">Djar Dev Company</span>
      <div class="d-flex">
        <span class="text-dark text-uppercase h1">E-Arsip</span>
      </div>
    </div>
    <div class="row">
      @foreach ($website as $data)
        <div class="col-sm-6 col-lg-3 col-md-6">
          <div class="card shadow shadow-lg pointer">
            <img class="text-center align-self-center rounded-circle pt-4 visit-url" width="200"
              src="{{ asset('storage/' . $data->logo) }}" alt="{{ $data->name }}" data-url="{{ $data->url }}">
            <div class="card-body">
              <h4 class="card-title text-center text-capitalize height visit-url" data-url="{{ $data->url }}">
                {{ $data->name }}</h4>
              <p class="card-text justify description">{{ Str::limit($data->description, 120, '...') }}</p>
              <p class="d-none card-text justify content">{{ $data->description }}</p>
              <p class="card-text">
              <div class="d-flex justify-content-between align-items-center">
                <button class="btn btn-sm btn-light rounded show-more">Selengkapnya</button>
              </div>
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    const visitUrl = document.querySelectorAll('.visit-url');
    visitUrl.forEach((element, index) => {
      element.addEventListener('click', () => {
        window.location.href = visitUrl[index].getAttribute('data-url');
      });
    });

    const showMore = document.querySelectorAll('.show-more');
    const description = document.querySelectorAll('.description');
    const content = document.querySelectorAll('.content');
    showMore.forEach((element, index) => {
      element.addEventListener('click', () => {
        description[index].classList.toggle('d-none');
        content[index].classList.toggle('d-none');
        showMore[index].textContent = description[index].classList.contains('d-none') ?
          'Lebih Sedikit' :
          'Selengkapnya';
      });
    });
  </script>
@endpush
