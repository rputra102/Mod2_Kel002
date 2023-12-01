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
        <h5 class="card-title fw-bolder mb-3">Tambah</h5>
        <form method="post" action="{{route('admin.store')}}">
            @csrf
            <div class="mb-3">
                <label for="tanggal_transaksi" class="form-label">Tanggal_Transaksi</label>
                <input type="text" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi">
            </div>
            <div class="mb-3">
                <label for="ID_Rental" class="form-label">ID Rental</label>
                <input type="text" class="form-control" id="id_rental" name="id_rental">
            </div>
            <div class="mb-3">
                <label for="renter" class="form-label">Renter</label>
                <select class="form-control" id="id_pelanggan" name="id_pelanggan">
                    <option disabled selected></option>
                    <option value = "1">ler</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_kaset" class="form-label">Kaset</label>
                <select class="form-control" id="id_kaset" name="id_kaset">
                    <option disabled selected></option>
                    <option value = "1">Kendrick Lamar</option>
                    <option value = "2">Michael Jackson</option>
                    <option value = "5">Beethoven</option>
                    <option value = "17">Skrillex</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_staff" class="form-label">Staff</label>
                <select class="form-control" id="id_staff" name="id_staff">
                    <option disabled selected></option>
                    <option value = "1">Putra</option>
                    <option value = "2">Setap</option>
                </select>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
            <style>
                .card-body {
                font-family: 'Manrope', sans-serif;
                color: silver;
                background: #00000d;    
            }   

                .mb-3 {
                    color: pink;
                }
    </style>
        </form>
    </div>
</div>
@stop