@extends('layouts.app')
@section('title', 'Dashboard')
@push('styles')
  <style>
    .card:hover {
      cursor: pointer;
      transform: scale(.98);
      transition: 0.5s;
    }

    .card {
      transition: 0.5s;
    }

    .justify {
      text-align: justify;
    }

    .height {
      min-height: 70px;
    }
  </style>
@endpush
@section('content')
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-7 align-self-center">
        @if (\Illuminate\Support\Carbon::now()->format('h') < 12)
          <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning, <span
              class="text-capitalize">{{ Auth::user()->name }}</span>!</h3>
        @elseif (\Illuminate\Support\Carbon::now()->format('h') < 18 && \Illuminate\Support\Carbon::now()->format('h') > 12)
          <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Afternoon, <span
              class="text-capitalize">{{ Auth::user()->name }}</span>!</h3>
        @elseif (\Illuminate\Support\Carbon::now()->format('h') > 18 && \Illuminate\Support\Carbon::now()->format('h') < 24)
          <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Evening, <span
              class="text-capitalize">{{ Auth::user()->name }}</span>!</h3>
        @else
          <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Night, <span
              class="text-capitalize">{{ Auth::user()->name }}</span>!</h3>
        @endif
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      @foreach ($website as $data)
        <div class="col-sm-6 col-lg-4">
          <div class="card shadow shadow-lg" onclick="location.href='{{ route('admin.website.view', $data->slug) }}';">
            <img class="text-center align-self-center img-fluid" src="{{ asset('storage/' . $data->logo) }}"
              alt="{{ $data->name }}">
            <div class="card-body">
              <h4 class="card-title text-capitalize height">{{ $data->name }}</h4>
              <p class="card-text justify">{{ Str::limit($data->description, 100) }}</p>
              <p class="card-text">
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                  <a href="{{ $data->url }}" class="">{{ $data->url }}</a>
                </small>
                <small>
                  <span class="badge bg-success rounded rounded-lg">Publish
                    {{ $data->created_at->diffForHumans() }}</span>
                </small>
              </div>
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
