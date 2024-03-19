<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pre Test 1') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <h2 class="text-center">Edit Data</h2>
                <form action="{{ route('update-data', $data->id) }}" method="POST" class="form-group">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 form-group col-8">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode"
                            name="kode" placeholder="Kode Barang" value="{{ $data->kode }}">
                        @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group col-8">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" placeholder="Nama Barang" value="{{ $data->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-group col-8">
                        <label for="kd_satuan" class="form-label">Kategori Barang</label>
                        <select class="form-select" name="kd_kategori" aria-label="Default select example">
                            <option value="" selected disabled>Kategori Barang</option>
                            @foreach ($kategories as $kategori)
                                <option value="{{ $kategori->kode }}"
                                    {{ $data->kd_kategori == $kategori->kode ? 'selected' : '' }}>{{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kd_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group col-8">
                        <label for="kd_satuan" class="form-label">Kode Satuan</label>
                        <input type="text"
                            class="form-control @error('kd_satuan') is-invalid
                        @enderror"
                            id="kd_satuan" name="kd_satuan" placeholder="Kode Satuan" value="{{ $data->kd_satuan }}">
                        @error('kd_satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-group col-8">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                            max="100" name="jumlah" placeholder="Jumlah" value="{{ $data->jumlah }}">
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
