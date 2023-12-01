@extends('kaset.layout')
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
        <form method="post" action="{{route('kaset.store')}}">
            @csrf
            <div class="mb-3">
                <label for="id_kaset" class="form-label">ID Kaset</label>
                <input type="text" class="form-control" id="id_kaset" name="id_kaset">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre">
            </div>
            <div class="mb-3">
                <label for="band" class="form-label">Band</label>
                <input type="text" class="form-control" id="band" name="band">
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