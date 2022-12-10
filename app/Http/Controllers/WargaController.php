<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(){
        $wargas = Warga::get();
        return view('warga.index', compact('wargas'));
    }

    public function create(){
        $kelurahans = Kelurahan::all();
        return view('warga.create', compact('kelurahans'));
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nik' => 'required|numeric',
            'nama' => 'required',
            'kelurahan_id' => 'required|numeric'
        ]);

        Warga::create($validate);
        return redirect() -> route('warga.index') -> with('message', "Data Warga {$validate['nama']} berhasil ditambahkan");
    }

    public function destroy(Warga $warga){
        $warga->delete();
        return redirect()->route('warga.index') -> with('message', "Data Warga {$warga->nama} berhasil dihapus");
    }

    public function edit(Warga $warga){
        $kelurahans = Kelurahan::all();
        return view('warga.edit', compact('warga', 'kelurahans'));
    }

    public function update(Request $request, Warga $warga){
        $validate = $request->validate([
            'nik' => 'required|numeric',
            'nama' => 'required',
            'kelurahan_id' => 'required|numeric'
        ]);

        $warga -> update($validate);

        return redirect() -> route('warga.index') -> with('message', "Data warga $warga->nama berhasil diubah");
    }

    public function show(Warga $warga)
    {
        return view('warga.show', compact('warga'));
    }
}
