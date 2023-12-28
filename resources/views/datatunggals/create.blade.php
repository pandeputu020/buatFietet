@extends('layout.main')
@section('title', 'datatunggals.create')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tambah Data</h1>

    <div class="row">
        <div class="col-6">            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('datatunggals.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>skor</label>
                            <input type="text" name="skor" class="form-control">
                            @error('skor')
                                {{$message}}
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-sm btn-warning"> Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>   
@endsection