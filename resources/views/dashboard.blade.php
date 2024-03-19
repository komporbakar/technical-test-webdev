<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-center">Get Data From https://randomuser.me/api/</h2>
                <div class="d-flex justify-content-center gap-2">
                    <a onclick="window.location.reload()" class="btn btn-primary">Get Data</a>
                    <a onclick="document.getElementById('delete').submit()" class="btn btn-danger">Remove</a>
                    <form action="{{ route('deleteData') }}" id="delete" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')</form>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Jalan</th>
                            <th scope="col">Email</th>
                            <th scope="col">Profesi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_kelamin->jenis_kelamin }}</td>
                                <td>{{ $item->nama_jalan }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $profesi[$item->profesi] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h2 class="text-center mt-5">Count Data</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Profesi</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>Petani</td>
                            <td>{{ $petani }}</td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>Teknisi</td>
                            <td>{{ $teknisi }}</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Guru</td>
                            <td>{{ $guru }}</td>
                        </tr>
                        <tr>
                            <th>4</th>
                            <td>Nelayan</td>
                            <td>{{ $nelayan }}</td>
                        </tr>
                        <tr>
                            <th>5</th>
                            <td>Seniman</td>
                            <td>{{ $seniman }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
