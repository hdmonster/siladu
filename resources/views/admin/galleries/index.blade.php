@extends('layouts.admin')

@section('content')
<h3 class="ml-2 mb-4">Galeri</h3>

<div class="row">

  @foreach($galleries as $gallery)

  <div class="card shadow m-2" style="width: 30rem">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary"></h6>
      <div class="row">
        <button class="btn p-0 mr-2" data-id="{{ $gallery->id }}" data-toggle="modal" data-target="#updateGaleriModal">
          <i class="fas fa-edit fa-sm fa-fw text-warning"></i>
        </button>

        <form action="/admin/galleries/{{ $gallery->id }}" method="post">
          @method('delete')
          @csrf
          <button class="btn p-0" type="submit"
            onclick="return confirm('Apakah kamu yakin ingin menghapus gambar ini?')">
            <i class="fas fa-trash fa-sm fa-fw text-danger"></i>
          </button>
        </form>
      </div>
    </div>
    <div class="card-body">

      <img class="img-fluid img-thumbnail mt-0 mb-2" style="box-fit: cover"
        src="{{ asset('storage/' . $gallery->url) }}" alt="Gallery">

      <div class="d-flex flex-column">

        <span class="mb-4">
          {{ $gallery->description }}
        </span>

        <div class="d-flex justify-content-end">
          <span class="badge badge-info p-2 text-capitalize">{{ $gallery->tag }}</span>
        </div>
      </div>

    </div>
  </div>

  @endforeach

</div>

@endsection