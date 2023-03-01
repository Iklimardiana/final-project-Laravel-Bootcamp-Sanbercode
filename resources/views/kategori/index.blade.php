@extends('layouts.master')
@section('title')
    Category
@endsection

@push('scripts')

    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>

    <script src="{{ asset('/template/plugins/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/template/plugins/dataTables.bootstrap4.js') }}"></script>

    <script type="text/javascript">
        $(function(){
            $(document).on('click','#deleteKategori', function(e){
                e.preventDefault();
                var data_id = $(this).attr("data-id");
                var data_nama = $(this).attr("data-name");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to remove " + data_nama + "?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/category/" + data_id,
                        Swal.fire(
                        'Deleted!',
                        data_nama + ' has been deleted.',
                        'success'
                        )
                    }
                    })

            });
        });
    </script>

@endpush

@push('styles')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.2/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>

@endpush

@section('kategori')
<table class="table table-bordered table-hover" id="example1">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Kategori</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($data as $key => $item)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$item->name}}</td>
        <td>
            @guest
                <a href="/login">Silahkan Login jika ingin menggunakan Action!</a>
            @endguest
            @auth
                <a href="/category/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{url ('category/'.$item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" name="submit"class="btn btn-danger btn-sm">Del</button>
                </form>
            @endauth
        </td>
      </tr>

      @empty
        <tr>
            <td></td>
            <td>
                Tidak ada Kategori
            </td>
            <td></td>
        </tr>
      @endforelse

    </tbody>
  </table>
@endsection
