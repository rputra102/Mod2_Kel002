@extends('admin.layout')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>
@endif

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Ubah Data</h5>
        <form method="post" action="{{ route('admin.update', $data->no_VIN) }}">
            @csrf
            <div class="mb-3">
                <label for="no_VIN" class="form-label">Nomor VIN</label>
                <input type="text" class="form-control" id="no_VIN" name="no_VIN" value="{{ $data->no_VIN }}">
            </div>
            <div class="mb-3">
                <label for="Model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model"
                    value="{{ $data->model }}">
            </div>
            <div class="mb-3">
                <label for="Tahun Produksi" class="form-label">Tahun Produksi</label>
                <input type="text" class="form-control" id="tahun_produksi" name="tahun_produksi" value="{{ $data->tahun_produksi }}">
            </div>
            <div class="mb-3">
                <label for="Warna" class="form-label">Warna</label>
                <input type="text" class="form-control" id="warna" name="warna" value="{{ $data->warna }}">
            </div>
            <div class="mb-3">
                <label for="Harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">
            <div class="mb-3">
                <label for="id_pabrik" class="form-label">Pabrik</label>
                <select class="form-control" id="id_pabrik" name="id_pabrik">
                    <option value = "1337">Tokyo_Import</option>
                    <option value = "9224">Semarang</option>
                    <option value = "9984">Bekasi</option>
                </select>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop