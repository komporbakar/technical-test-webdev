<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HasilResponse;
use App\Models\KategoriBarang;
use App\Models\Profesi;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;
use App\RandomUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function getdata()
    {

        $data = RandomUser::fetchData();

        $gender = $data['gender'] == 'female' ? 1 : 2;
        $name = $data['name']['first'] . ' ' . $data['name']['last'];
        $address = $data['location']['street']['name'];
        $email = $data['email'];

        //md5
        $md5 = $data['login']['md5'];

        $angka_kurang = 0;
        $angka_lebih = 0;
        for ($i = 0; $i < strlen($md5); $i++) {
            $angka = $md5[$i];
            if (is_numeric($angka) && $angka < 7) {
                $angka_kurang++;
                // return $angka_kurang;
            }
            if (is_numeric($angka) && $angka > 7) {
                $angka_lebih++;
                // return $angka_lebih;
            }
        }
        $profesiData = Profesi::all();
        $profesiArray = [];
        foreach ($profesiData as $profesi) {
            $profesiArray[$profesi->kode] = $profesi->profesi;
        }

        $profesiRandomCode = array_rand($profesiArray);


        $insert_data = HasilResponse::create([
            'jeniskelamin' => $gender,
            'nama' => $name,
            'nama_jalan' => $address,
            'email' => $email,
            'angka_kurang' => $angka_kurang,
            'angka_lebih' => $angka_lebih,
            'profesi' => $profesiRandomCode,
            'plain_json' => json_encode($data),
        ]);


        $datas = HasilResponse::with('jenis_kelamin', 'profesi')->get();

        $petani_count = HasilResponse::where('profesi', 'A')->count();
        $teknisi_count = HasilResponse::where('profesi', 'B')->count();
        $guru_count = HasilResponse::where('profesi', 'C')->count();
        $nelayan_count = HasilResponse::where('profesi', 'D')->count();
        $seniman_count = HasilResponse::where('profesi', 'E')->count();

        if ($insert_data) {
            return view('pre_test_satu', ['data' => $datas, 'profesi' => $profesiArray, 'petani' => $petani_count, 'teknisi' => $teknisi_count, 'guru' => $guru_count, 'nelayan' => $nelayan_count, 'seniman' => $seniman_count]);
        } else {
            return 'Gagal Insert Data';
        }
    }

    public function destoy_data()
    {
        HasilResponse::truncate();
        return redirect('/home');
    }

    //pre test 2

    public function preTestDua()
    {
        $datas = Barang::with('kategori', 'satuan')->paginate(5);
        return view('pre_test_dua', compact('datas'));
    }

    public function create()
    {
        $kategories = KategoriBarang::all();

        return view('create', compact('kategories'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'kd_kategori' => 'required',
            'kd_satuan' =>
            [
                'required',
                function ($attribute, $value, $fail) {
                    $checkSatuan = SatuanBarang::where('kode', $value)->first();
                    if (!$checkSatuan) {
                        $fail('Kode Satuan Tidak Terdaftar');
                    }
                },
            ],
            'nama' => 'required|unique:tabel_barang',
            'jumlah' => 'nullable||max:100',
        ]);



        $kode = Str::random(6);


        $save = Barang::create([
            'kd_kategori' => $request->kd_kategori,
            'kd_satuan' => $request->kd_satuan,
            'kode' => $kode,
            'nama' => $validate['nama'],
            'jumlah' => $validate['jumlah'],
            'id_user_insert' => Auth::user()->id,
        ]);

        return redirect('/pre-test-2')->with('success', 'Data Berhasil disimpan');
    }

    public function edit(Request $request, $id)
    {
        $data = Barang::find($id);
        $kategories = KategoriBarang::all();

        return view('edit', compact('data', 'kategories'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'kd_kategori' => 'required',
            'kode' => 'required|max:6|unique:tabel_barang,id,' . $id,
            'kd_satuan' =>
            [
                'required',
                function ($attribute, $value, $fail) {
                    $checkSatuan = SatuanBarang::where('kode', $value)->first();
                    if (!$checkSatuan) {
                        $fail('Kode Satuan Tidak Terdaftar');
                    }
                },
            ],
            'nama' => 'required|unique:tabel_barang,id,' . $id,
            'jumlah' => 'nullable|integer|max:100',
        ]);

        $data = Barang::find($id);
        $data = $data->update([
            'kd_kategori' => $validate['kd_kategori'],
            'kd_satuan' => $validate['kd_satuan'],
            'kode' => $validate['kode'],
            'nama' => $validate['nama'],
            'jumlah' => $validate['jumlah'],
        ]);

        return redirect('/pre-test-2')->with('success', 'Data Berhasil diupdate');
    }
}
