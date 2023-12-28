@extends('layout.main')
@section('title', 'datatunggals.index')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Tunggal</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('datatunggals.create') }}" class="btn btn-md btn-success mb-3">Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Skor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($datatunggals as $datatunggal)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $datatunggal->skor }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('datatunggals.destroy', $datatunggal->id)}}" method="post">
                                    <a href="{{route('datatunggals.edit', $datatunggal->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data User belum Tersedia.
                        </div>
                        @endforelse                                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection