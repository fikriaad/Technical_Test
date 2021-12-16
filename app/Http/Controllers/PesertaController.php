<?php

namespace App\Http\Controllers;

use App\Peserta_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;



class PesertaController extends Controller
{
    public function index()
    {
        $peserta  = DB::table('tb_peserta')->get();
        return view(
            'backend/page/peserta/index',
            [
                'peserta' => $peserta
            ]
        );
    }
    public function create()
    {
        return view(
            'backend/page/peserta/form',
            [
                'url' => 'peserta.store'
            ]
        );
    }
    public function store(Request $request, Peserta_Model $peserta)
    {
        $validator = Validator::make($request->all(), [
            'peserta_nama'         => 'required',
            'peserta_email'        => 'required|email|unique:tb_peserta,peserta_email',
            'peserta_nilai_x'     => 'required|numeric|min:1|max:33',
            'peserta_nilai_y'     => 'required|numeric|min:1|max:23',
            'peserta_nilai_z'     => 'required|numeric|min:1|max:18',
            'peserta_nilai_w'     => 'required|numeric|min:1|max:13',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('peserta.create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $peserta->peserta_nama = $request->input('peserta_nama');
            $peserta->peserta_email = $request->input('peserta_email');
            $peserta->peserta_nilai_x = $request->input('peserta_nilai_x');
            $peserta->peserta_nilai_y = $request->input('peserta_nilai_y');
            $peserta->peserta_nilai_z = $request->input('peserta_nilai_z');
            $peserta->peserta_nilai_w = $request->input('peserta_nilai_w');
            // dd($peserta);
            $peserta->save();

            return redirect()
                ->route('peserta')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }
    public function edit(Peserta_Model $peserta)
    {
        return view(
            'backend/page/peserta/form',
            [
                'peserta' => $peserta,
                'url' => 'peserta.update',
            ]
        );
    }

    public function update(Request $request, Peserta_Model $peserta)
    {
        $validator = Validator::make($request->all(), [
            'peserta_nama'         => 'required',
            'peserta_email'        => 'required|email',
            'peserta_nilai_x'     => 'required|numeric|min:1|max:33',
            'peserta_nilai_y'     => 'required|numeric|min:1|max:23',
            'peserta_nilai_z'     => 'required|numeric|min:1|max:18',
            'peserta_nilai_w'     => 'required|numeric|min:1|max:13',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('peserta.update', $peserta->peserta_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $peserta->peserta_nama = $request->input('peserta_nama');
            $peserta->peserta_email = $request->input('peserta_email');
            $peserta->peserta_nilai_x = $request->input('peserta_nilai_x');
            $peserta->peserta_nilai_y = $request->input('peserta_nilai_y');
            $peserta->peserta_nilai_z = $request->input('peserta_nilai_z');
            $peserta->peserta_nilai_w = $request->input('peserta_nilai_w');

            $peserta->save();

            return redirect()
                ->route('peserta')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Peserta_Model $peserta)
    {
        $peserta->forceDelete();
        return redirect()
            ->route('peserta')
            ->with('message', 'Data berhasil dihapus');
    }
    public function report(Peserta_Model $peserta)
    {
        $id_peserta = $peserta->peserta_id;
        $laporan  = DB::table('tb_peserta')
            ->where('peserta_id', '=', $id_peserta)
            ->first();
        $intelegensi = (($laporan->peserta_nilai_x * 0.4) + ($laporan->peserta_nilai_y * 0.6)) / 2;
        $ability  = (($laporan->peserta_nilai_z * 0.3) + ($laporan->peserta_nilai_y * 0.7)) / 2;
        return view(
            'backend/page/peserta/report',
            [
                'laporan' => $laporan,
                'intelegensi' => $intelegensi,
                'ability' => $ability,
            ]
        );
    }
}
