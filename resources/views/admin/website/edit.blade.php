@extends('layouts.app')
@section('title', 'Edit Website')
@section('content')
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-7 align-self-center">
        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Website</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.website') }}" class="text-muted">Website</a></li>
              <li class="breadcrumb-item text-muted active" aria-current="page">Edit</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center">
        <div class="card">
          <div class="card-body">
            <img src="{{ asset('storage/' . $website->logo) }}" alt="{{ $website->name }}" class="rounded-circle">
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Edit Data Website</h4>
            <form action="{{ route('admin.website.update', $website->uuid) }}" method="POST"
              enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-body">
                @if (session()->has('errors'))
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group mb-3">
                      <label class="form-label" for="name">Nama Aplikasi</label>
                      <input type="text" name="name" id="name" class="form-control"
                        placeholder="Sistem Informasi Akademik" value="{{ old('name', $website->name) }}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label class="form-label" for="url">URL Aplikasi</label>
                      <input type="text" name="url" id="url" class="form-control"
                        placeholder="https://siakad.id" value="{{ old('url', $website->url) }}">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group mb-3">
                      <label class="form-label" for="logo">Logo Aplikasi</label>
                      <input type="file" name="logo" id="logo" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <label class="form-label" for="description">Deskripsi Aplikasi</label>
                      <textarea name="description" id="description" rows="5" class="form-control" placeholder="...">{{ old('description', $website->description) }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <div class="text-end">
                  <button type="submit" class="btn btn-info rounded">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
