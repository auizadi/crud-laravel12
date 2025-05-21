<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('barangs.update', $barang->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')



                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}"
                                    placeholder="Masukkan nama barang">

                                <!-- error message untuk nama_barang -->
                                @error('nama_barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                    name="deskripsi" value="{{ old('deskripsi', $barang->deskripsi) }}"
                                    placeholder="Masukkan deskripsi barang">

                                <!-- error message untuk deskripsi -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Harga Satuan</label>
                                        <input type="number"
                                            class="form-control @error('harga_satuan') is-invalid @enderror"
                                            name="harga_satuan" value="{{ old('harga_satuan', $barang->harga_satuan) }}"
                                            placeholder="Masukkan harga barang">

                                        <!-- error message untuk harga_satuan -->
                                        @error('harga_satuan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">jumlah</label>
                                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                            name="jumlah" value="{{ old('jumlah', $barang->jumlah) }}"
                                            placeholder="Masukkan jumlah barang">

                                        <!-- error message untuk jumlah -->
                                        @error('jumlah')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Foto</label>
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        name="foto">

                                    <!-- error message untuk foto -->
                                    @error('foto')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    {{-- <script>
        CKEDITOR.replace('description');
    </script> --}}
</body>

</html>
