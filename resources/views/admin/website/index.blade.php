@extends('layouts.app')
@section('title', 'Daftar Website')
@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
@endpush
@section('content')
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-7 align-self-center">
        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Website</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a></li>
              <li class="breadcrumb-item text-muted active" aria-current="page">Website</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <a href="{{ route('admin.website.add') }}" class="btn btn-primary rounded mb-4">Tambah Data</a>
            <div class="table-responsive">
              <table id="zero_config" class="table border table-bordered text-nowrap">
                <thead class="align-middle">
                  <tr>
                    <th>Nama Aplikasi</th>
                    <th>Deskripsi</th>
                    <th>Logo</th>
                    <th>Publish Pada</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody class="align-middle">
                  @foreach ($website as $data)
                    <tr>
                      <td>
                        <div class="d-flex flex-column">
                          <span>{{ $data->name }}</span>
                          <small><a href="{{ $data->url }}">{{ $data->url }}</a></small>
                        </div>
                      </td>
                      <td>{{ Str::limit($data->description, 40) }}</td>
                      <td>
                        <img src="{{ asset('storage/' . $data->logo) }}" alt="{{ $data->name }}"
                          class="img-fluid rounded-circle">
                      </td>
                      <td>{{ $data->created_at->format('d M Y') }}</td>
                      <td class="d-flex align-items-center justify-content-center gap-1">
                        <a href="{{ route('admin.website.view', $data->slug) }}"
                          class="btn btn-sm btn-secondary rounded-circle">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.website.edit', $data->uuid) }}"
                          class="btn btn-sm btn-warning rounded-circle">
                          <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.website.delete', $data->uuid) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger rounded-circle">
                            <i class="fa fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
@endpush
