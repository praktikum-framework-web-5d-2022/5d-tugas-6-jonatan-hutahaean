<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index(){
        $kelurahans = Kelurahan::get();
        return view('kelurahan.index', compact('kelurahans'));
    }

    public function create(){
        return view('kelurahan.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nama' => 'required',
            'ketua_rw' => 'required'
        ]);

        Kelurahan::create($validate);
        return redirect() -> route('kelurahan.index') -> with('message', "Data kelurahan {$validate['nama']} berhasil ditambahkan");
    }

    public function destroy(Kelurahan $kelurahan){
        $kelurahan->delete();
        return redirect()->route('kelurahan.index') -> with('message', "Data Warga dari kelurahan {$kelurahan->nama} dihapus semuanya");
    }

    public function edit(Kelurahan $kelurahan){
        return view('kelurahan.edit', compact('kelurahan'));
    }

    public function update(Request $request, Kelurahan $kelurahan){
        $validate = $request->validate([
            'nama' => 'required',
            'ketua_rw' => 'required'
        ]);

        $kelurahan -> update($validate);

        return redirect() -> route('kelurahan.index') -> with('message', "Data pada warga dan kelurahan berhasil diubah");
    }

    public function show(Kelurahan $kelurahan)
    {
        return view('kelurahan.show', compact('kelurahan'));
    }
}
