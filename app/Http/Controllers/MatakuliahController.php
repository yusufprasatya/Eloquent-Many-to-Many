<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    //
    public function all()
    {
        $matakuliahs = Matakuliah::all();
        foreach ($matakuliahs as $matakuliah) {
            echo "$matakuliah->id | $matakuliah->kode |
                  $matakuliah->nama | $matakuliah->jumlah_sks <br>";
        }
    }

    public function attach()
    {
        $mahasiswa = Mahasiswa::find(4);
        $matakuliah = Matakuliah::find(3);

        $matakuliah->mahasiswas()->attach($mahasiswa);
        echo "Proses attach berhasil";
    }

    public function attachWhere()
    {
        $matakuliah = Matakuliah::where('nama', 'Kalkulus Dasar')->first();
        $mahasiswas = Mahasiswa::where('jurusan', 'Teknik Informatika')->get();

        $matakuliah->mahasiswas()->attach($mahasiswas);
        echo "Proses attach berhasil";
    }

    public function tampil()
    {
        $matakuliah = Matakuliah::where('nama', 'Kalkulus Dasar')->first();
        echo "## Daftar mahasiswa yang mengambil mata kuliah $matakuliah->nama ## ";
        echo "<hr>";

        foreach ($matakuliah->mahasiswas as $mahasiswa) {
            echo "$mahasiswa->nim: $mahasiswa->nama ($mahasiswa->jurusan) <br>";
        }
    }

    public function detach()
    {
        $matakuliah = Matakuliah::where('nama', 'Kalkulus Dasar')->first();
        $mahasiswa = Mahasiswa::where('nama', 'Galang Maryadi')->first();

        $matakuliah->mahasiswas()->detach($mahasiswa);
        echo "Proses detach berhasil";
    }

    
}
