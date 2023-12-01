@extends('admin.layout')
@section('content')

<h4 class="mt-5">Bin Kaset</h4>


    <style>
    /* Dropdown Button */

    .wrapper {
        background: url('https://img.freepik.com/free-photo/artistic-blurry-colorful-wallpaper-background_58702-8546.jpg?size=626&ext=jpg&ga=GA1.1.1413502914.1696982400&semt=ais');
        display: cover;
    }

    .dropbtn {
    background-color: #00000d;
    color: pink;
    padding: 16px;
    font-size:16px;
    border: none;
    }

/* The container <div> - needed to position the dropdown content */
    .dropdown {
    position: relative;
    display: inline-block;
    }

/* Dropdown Content (Hidden by Default) */
    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #00000d;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    }

/* Links inside the dropdown */ 
    .dropdown-content a {
    color: #dddddd;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    }

/* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #00000d;}

    .dropdown-content a:hover {color: pink;}

/* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {background-color: #00000d;}
    </style>    
  </div>
</div>



@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Kaset</th>
            <th>Genre</th>
            <th>Band</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_kaset }}</td>
            <td>{{ $data->genre }}</td>
            <td>{{ $data->band }}</td>
            <td>
                <a href="{{ route('kaset.restore', $data->id_kaset) }}" type="button"
                    class="btn btn-success rounded-3">Restore</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_kaset }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_kaset }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('kaset.delete', $data->id_kaset) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <style>
        .table {
            color: #dddddd;
        }
    </style>
</table>
@stop