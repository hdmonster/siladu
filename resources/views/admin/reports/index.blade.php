@extends('layouts.admin')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Laporan Aduan</h1>
<p class="mb-4">Laporan didapatkan dari masyarakat yang entry pengaduan di halaman utama SILADU</p>

<!-- Tabel Aduan -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Pengaduan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Umur</th>
            <th>Jenis Pengaduan</th>
            <th>Tanggal Aduan</th>
            <th>Status</th>
            <th>Action</th>
            <th>#</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama</th>
            <th>Umur</th>
            <th>Jenis Pengaduan</th>
            <th>Tanggal Aduan</th>
            <th>Status</th>
            <th>Action</th>
            <th>#</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($reports as $report)

          <tr>
            <td>{{ $report->nama }}</td>
            <td>{{ $report->umur }}</td>
            <td class="text-capitalize">{{ $report->jenis_laporan }}</td>
            <td>{{ $report->created_at->format('d M Y H:m') }}</td>
            <td>

              <?php
                if($report->status == 'butuh konfirmasi')
                  $className = 'btn-warning';
                elseif($report->status == 'sedang diproses')
                  $className = 'btn-primary';
                elseif($report->status == 'selesai')
                  $className = 'btn-success';
                elseif($report->status == 'spam')
                  $className = 'btn-danger';
              ?>

              <button class="btn {{ $className }} btn-sm px-4 mx-2 text-capitalize" disabled>
                {{ $report->status }}
              </button>
            </td>
            <td>
              <a href="#" class="btn btn-secondary btn-icon-split btn-sm" data-id="{{ $report->uuid }}"
                data-toggle="modal" data-target="#detailModal">
                <span class="icon text-white-50">
                  <i class="fas fa-eye"></i>
                </span>
                <span class="text">Lihat detail</span>
              </a>
            </td>
            <td>
              @if($report->status == 'butuh konfirmasi')
              <div class="row">

                <form action="/admin/reports/{{ $report->uuid }}/update-status/confirm" method="post">
                  @method('put')
                  @csrf
                  <button class="btn btn-circle btn-sm btn-success mx-2"
                    onclick="return confirm('Apakah anda ingin mengkonfirmasi laporan ini?')">
                    <i class="fas fa-check"></i>
                  </button>
                </form>

                <form action="/admin/reports/{{ $report->uuid }}/update-status/spam" method="post">
                  @method('put')
                  @csrf
                  <button class="btn btn-circle btn-sm btn-danger"
                    onclick="return confirm('Apakah anda ingin menandakan laporan ini sebagai spam?')">
                    <i class="fas fa-times"></i>
                  </button>
                </form>

              </div>

              @elseif($report->status == 'sedang diproses')

              <form action="/admin/reports/{{ $report->uuid }}/update-status/finish" method="post">
                @method('put')
                @csrf
                <button class="btn btn-sm btn-success"
                  onclick="return confirm('Apakah anda ingin menandakan laporan ini sebagai selesai?')">
                  Selesai
                </button>
              </form>

              @elseif($report->status == 'spam')

              <div class="row">

                <form action="/admin/reports/{{ $report->uuid }}/update-status/unspam" method="post">
                  @method('put')
                  @csrf
                  <button class="btn btn-circle btn-sm btn-warning mx-2"
                    onclick="return confirm('Apakah anda ingin mengembalikan status laporan seperti awal?')">
                    <i class="fas fa-undo"></i>
                  </button>
                </form>

                <form action="/admin/reports/{{ $report->uuid }}" method="post">
                  @method('delete')
                  @csrf
                  <button class="btn btn-circle btn-sm btn-danger"
                    onclick="return confirm('Apakah anda ingin menghapus laporan ini?')">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>

              </div>

              @endif
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@include('admin.components.report-detail-modal')

@endsection