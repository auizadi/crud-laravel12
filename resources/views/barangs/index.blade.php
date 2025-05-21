<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Barang</h3>
                    {{-- <h5 class="text-center"><a href="https://santrikoding.com">www.santrikoding.com</a></h5> --}}
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('barangs.create') }}" class="btn btn-md btn-success mb-3">Tambah Barang</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr  class="text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barangs as $barang)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->deskripsi }}</td>
                                        <td>{{ 'Rp ' . number_format($barang->harga_satuan, 2, ',', '.') }}</td>
                                        <td>{{ $barang->jumlah }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/barangs/' . $barang->foto) }}" class="rounded"
                                                style="width: 150px">
                                        </td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('barangs.destroy', $barang->id) }}" method="POST">
                                                <a href="{{ route('barangs.show', $barang->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('barangs.edit', $barang->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data barang belum ada.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $barangs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>

</html>
