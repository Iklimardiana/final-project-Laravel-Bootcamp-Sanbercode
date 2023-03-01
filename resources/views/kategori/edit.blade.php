@extends('layouts.master')
@section('title')
Category
@endsection
 @section('kategori-edit')

 <form action='{{url ('category/'.$data->id)}}' method='post'>
    @method('PUT')
 @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href={{url('category')}} class="btn btn-secondary">KEMBALI</a>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{ $data->name}}" id="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
    <!-- AKHIR FORM -->
 @endsection
 