@extends('layouts.app')
@section('title', 'Beranda')
@push('styles')
  <style>
    .card:hover {
      cursor: pointer;
      transform: scale(.98);
      transition: 0.5s;
    }

    .justify {
      text-align: justify;
    }
  </style>
@endpush
@section('content')
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-6 align-self-center">
        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Beranda</h4>
      </div>
      <div class="col-6 align-self-end text-end">
        <a href="{{ route('login') }}" class="btn btn-primary rounded">Login</a>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    @foreach ($website as $data)
      <div class="row">
        <div class="col-sm-6 col-lg-4">
          <div class="card" onclick="location.href='{{ route('view.website', $data->slug) }}';">
            <img class="text-center align-self-center img-fluid" src="{{ asset('storage/' . $data->logo) }}"
              alt="{{ $data->name }}">
            <div class="card-body">
              <h4 class="card-title text-capitalize">{{ $data->name }}</h4>
              <p class="card-text justify">{{ Str::limit($data->description, 100) }}</p>
              <p class="card-text">
                <small class="text-muted">
                  <a href="{{ $data->url }}" class="">{{ $data->url }}</a>
                </small>
              </p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
