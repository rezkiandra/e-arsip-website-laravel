@extends('layouts.app')
@section('title', 'Detail Website')
@push('styles')
  <style>
    .justify {
      text-align: justify;
    }
  </style>
@endpush
@section('content')
  <div class="page-breadcrumb border-bottom pb-3">
    <div class="row">
      <div class="col-12 align-self-center">
        <div class="d-flex d-lg-flex align-items-center justify-content-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <h3 class="breadcrumb-item"><a href="javascript:void()" class="text-dark text-uppercase">Detail Website</a></h3>
            </ol>
          </nav>
        </div>
      </div>
      {{-- <div class="col-6 align-self-end text-end">
        <a href="{{ route('login') }}" class="btn btn-primary rounded">Login</a>
      </div> --}}
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-12">
        <div class="card shadow shadow-lg">
          <div class="card-body">
            <a href="{{ route('home') }}" class="btn btn-sm btn-primary rounded mb-3">Kembali</a>
            <div class="mb-4">
              <h3 class="card-title">{{ $website->name }} - <a href="{{ $website->url }}"
                  class="text-primary">{{ $website->url }}</a></h3>
              <h6 class="">Terakhir update {{ $website->updated_at->diffForHumans() }}</h6>
              </h6>
            </div>
            <div class="media d-flex d-lg-flex align-items-start h-100 justify-content-between">
              <img class="align-self-start w-25 me-3 img-fluid rounded-circle"
                src="{{ asset('storage/' . $website->logo) }}" alt="{{ $website->name }}">
              <div class="media-body">
                <p class="text-dark justify">{{ $website->description }}</p>
                <div class="d-flex d-lg-flex justify-content-between align-items-center">
                  <span class="badge bg-success rounded rounded-lg">Publish
                    {{ $website->created_at->diffForHumans() }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
