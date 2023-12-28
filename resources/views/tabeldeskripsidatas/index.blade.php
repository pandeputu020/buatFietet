@extends('layout.main')
@section('title', 'tabeldeskripsidatas.index')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Distribusi Frekuensi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Skor Maksimum</th>
                            <th>Skor Minimum</th>
                            <th>Skor Rata-rata</th>
                            <th>Jumlah Data</th>
                            <th>Standar Deviasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $maxskor }}</td>
                            <td>{{ $minskor }}</td>
                            <td>{{ $averageskor }}</td>
                            <td>{{ $jumlahdataskor }}</td>
                            <td>{{ $standardeviasi}}</td>
                        </tr>                                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection