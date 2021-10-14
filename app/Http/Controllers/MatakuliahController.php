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
}
