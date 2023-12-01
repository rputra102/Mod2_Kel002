@extends('staff.layout')
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
        <form method="post" action="{{route('staff.store')}}">
            @csrf
            <div class="mb-3">
                <label for="id_staff" class="form-label">ID Staff</label>
                <input type="text" class="form-control" id="id_staff" name="id_staff">
            </div>
            <div class="mb-3">
                <label for="nama_staff" class="form-label">Nama Staff</label>
                <input type="text" class="form-control" id="nama_staff" name="nama_staff">
            </div>
            <div class="mb-3">
                <label for="band" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="kontak_staff" name="kontak_staff">
            </div>
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