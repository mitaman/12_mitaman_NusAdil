<?php

namespace App\Http\Controllers;

use App\Models\advokat_kategori_kasus;
use App\Models\KategoriKasus;
use App\Models\Pengacara;
use Illuminate\Http\Request;
use App\Models\Sewa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Redirect;

class SewaController extends Controller
{
    public function index(Request $request){
        $advokat = Pengacara::find($request->advokat_id);
        $useradvokat = User::find($advokat->user_id);
        return view('sewa', [
            'advokat_id' => $request->advokat_id,
            'advokat_name' => $useradvokat->name,
            'kategori_kasus_id' => $request->kategori_kasus_id,
            'kategori_kasus_name' => KategoriKasus::find($request->kategori_kasus_id)->name,
        ]);
    }

    public function create(Request $request){
        try {
            $request->validate([
                'pengacara_id' => 'required',
                'topik_kasus' => 'required',
                'deskripsi_kasus' => 'required'
            ]);
    
            $sewa = Sewa::create([
                'user_id' => Auth::id(),
                'pengacara_id' => $request->pengacara_id,
                'topik_kasus' => $request->topik_kasus,
                'deskripsi_kasus' => $request->deskripsi_kasus,
                'fee' => 0,
                'status' => 'pending',
            ]);
    
            return Redirect::route('dashboard')->with('success', 'Sewa berhasil dibuat');
        } catch (Exception $e) {
            dd('error', 'Gagal membuat sewa: ' . $e->getMessage());
        }
        
    }

    
    public function offer(Request $request, $sewa_id)
    {
        $request->validate([
            'fee' => 'required|numeric',
        ]);

        try {
            $sewa = Sewa::find($sewa_id);
            if ($sewa) {
                $sewa->update([
                    'fee' => $request->fee,
                    'status' => 'offered',
                ]);
                return Redirect::route('pengacara.offering')->with('success', 'Penawaran berhasil dikirim');
            } else {
                return Redirect::back()->with('error', 'Sewa tidak ditemukan');
            }
        } catch (Exception $e) {
            return Redirect::back()->with('error', 'Gagal mengirim penawaran: ' . $e->getMessage());
        }
    }

    public function pilihkasus(Request $request)
    {
        return view('pilihkasus', [
            'kategoriKasus' => KategoriKasus::all(),
        ]);
    }

    public function pilihpengacara(Request $request)
    {
        $kategori_kasus_id = $request->kategori_kasus;
        $advokatKategoriKasus = advokat_kategori_kasus::where        ('kategori_kasus_id', $kategori_kasus_id)->get();
        
        $advokats = [];
        foreach ($advokatKategoriKasus as $data) {
            $advokat = Pengacara::find($data->advokat_id);
            $advokats[] = [
                'id' => $advokat->id,
                'name' => User::find($advokat->user_id)->name,
            ];
        }

        return view('pilihpengacara', [
            'kategori_kasus_id' => $kategori_kasus_id,
            'kategoriKasus' => KategoriKasus::find($kategori_kasus_id)->name,
            'advokats' => $advokats,
        ]);
    }
}
