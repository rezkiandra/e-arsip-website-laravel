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
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-7 align-self-center">
        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Website</h4>
        <div class="d-flex d-lg-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.website') }}" class="text-muted">Website</a></li>
              <li class="breadcrumb-item text-muted active" aria-current="page">Detail</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-12">
        <div class="card">
          <div class="card-body">
            <div class="mb-4">
              <h3 class="card-title">{{ $website->name }} - <a href="{{ $website->url }}"
                  class="text-primary">{{ $website->url }}</a></h3>
              <h6 class="">Terakhir update {{ $website->updated_at->diffForHumans() }}</h6>
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
