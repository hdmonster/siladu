@extends('layouts.admin')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Admin SILADU</h1>

<!-- Tabel Aduan -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User Admin</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Tanggal dibuat</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
            <th>#</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Tanggal dibuat</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
            <th>#</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($users as $user)

          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->created_at->format('d M Y') }}</td>
            <td class="text-capitalize">{{ $user->role}}</td>
            <td>
              <button
                class="btn {{ $user->is_active ? 'btn-success' : 'btn-warning' }} btn-sm px-4 mx-2 text-capitalize"
                disabled>
                {{ $user->is_active ? 'active' : 'inactive'}}
              </button>
            </td>
            <td>
              <a href="#" class="btn btn-secondary btn-icon-split btn-sm" data-id="{{ $user->id }}" data-toggle="modal"
                data-target="#userDetailModal">
                <span class="icon text-white-50">
                  <i class="fas fa-eye"></i>
                </span>
                <span class="text">Lihat detail</span>
              </a>
            </td>
            <td>
              <div class="row">

                @if($user->is_active)

                <form action="/admin/users/{{ $user->id }}/update-status/0" method="post">
                  @method('put')
                  @csrf
                  <button class="btn btn-sm btn-warning mx-2"
                    onclick="return confirm('Apakah anda ingin menonaktifkan user ini?')">
                    Non Aktifkan
                  </button>
                </form>

                @else

                <form action="/admin/users/{{ $user->id }}/update-status/1" method="post">
                  @method('put')
                  @csrf
                  <button class="btn btn-sm btn-success mx-2"
                    onclick="return confirm('Apakah anda ingin mengaktifkan user ini?')">
                    Aktifkan
                  </button>
                </form>

                @endif

                <button class="btn btn-circle btn-sm btn-primary ml-2" data-id="{{ $user->id }}" data-toggle="modal"
                  data-target="#userUpdateModal">
                  <i class="fas fa-edit"></i>
                </button>

                <form action="/admin/users/{{ $user->id }}" method="post">
                  @method('delete')
                  @csrf
                  <button class="btn btn-circle btn-sm btn-danger mx-2"
                    onclick="return confirm('Apakah anda ingin menghapus laporan ini?')">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>

              </div>
            </td>

          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@include('admin.components.update-user-modal')

@include('admin.components.detail-user-modal')

@endsection