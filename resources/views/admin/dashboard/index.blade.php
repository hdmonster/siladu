@extends('layouts.admin')

@section('content')
<h4 class="mb-4 text-gray-800">Dashboard</h4>

<div class="row">

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Total Aduan Masuk
            </div>
            <div class="h4 mb-0 font-weight-bold text-gray-800">
              {{ $total_inbox }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-inbox fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
              Aduan Butuh Konfirmasi
            </div>
            <div class="h4 mb-0 font-weight-bold text-gray-800">
              {{ $total_need_confirm }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection