@extends('layout.master')



@section('container')

<div class="page-breadcrumb">

    <div class="row">

        <div class="col-7 align-self-center">

            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Undangan Baru</h3>

            <div class="d-flex align-items-center"></div>

        </div>

    </div>

</div>

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">

                    <strong class="card-title">Data kategori</strong>
                    <div class="col-auto text-left">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data kategori
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('kategori/store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama">Nama kategori</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse($data as $key => $value)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">{{ $key+1 }}</td>
                                <td class="px-4 py-3">{{ $value->nama }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$value->id_kategori}}"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal{{$value->id_kategori}}"><i class="fa fa-trash-o"></i></a>

                                    </div>
                                </td>
                </div>
                </td>
                </tr>

                <!-- Modal Hapus -->
                <div class="modal fade" id="hapusModal{{$value->id_kategori}}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{$value->id_kategori}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel{{$value->id_kategori}}">Konfirmasi Hapus Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <!-- Link untuk menghapus data -->
                                <a href="{{ url('kategori/delete/' . $value->id_kategori) }}" class="btn btn-danger">Ya, Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{$value->id_kategori}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$value->id_kategori}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel{{$value->id_kategori}}">Konfirmasi Hapus Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">
                                    <form action="{{ route('kategori.update', $value->id_kategori) }}" method="post">

                                        @csrf
                                        <div class="form-group">
                                            <label for="nama">Nama kategori</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="{{$value->nama}}" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
                </tbody>
                </table>
            </div>

        </div>

        <button type="button" class="btn btn-primary btn-add mt-2"><i class="fas fa-plus-circle"></i></button> <br>

        <button type="submit" class="btn btn-primary mt-2">Simpan</button>

        </form>

    </div>

</div>

</div>

</div>

</div>

@endsection



@section('script')

<script src="{{asset('FreeDash-lite-master/src')}}/dist/js/maps.js"></script>

<script>
    $(document).ready(function() {

        // Tombol Tambah

        $('.btn-add').on('click', function() {

            var inputCount = $('#input-container .input-row').length + 1;



            var newRow = $('<div class="input-row">' +

                '<div class="row">' +

                '<div class="col-lg-10">' +

                '<input class="form-control mt-2" type="datetime-local" name="sesi[]" id="sesi_' + inputCount + '">' +

                '</div>' +

                '<div class="col-lg-2">' +

                '<button class="btn btn-danger btn-remove"><i class="far fa-trash-alt"></i></button>' +

                '</div>' +

                '</div>' +

                '</div>');



            $('#input-container').append(newRow);

        });



        // Tombol Kurangi

        $('#input-container').on('click', '.btn-remove', function() {

            var row = $(this).closest('.input-row');

            row.remove();



            // Mengatur tombol Kurangi pada baris sebelumnya

            if ($('#input-container .input-row').length === 1) {

                $('#input-container .input-row .btn-remove').prop('disabled', true);

            }

        });

    });
</script>

@endsection