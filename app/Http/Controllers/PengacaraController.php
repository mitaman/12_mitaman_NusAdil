<?php

namespace App\Http\Controllers;

use App\Models\advokat_kategori_kasus;
use App\Models\KategoriKasus;
use App\Models\Pengacara;
use App\Models\Sewa;
use App\Models\User;
use App\Models\UserType;
use Exception;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PengacaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getregister()
    {
        return view('pengacara', [
            'user' => Auth::user(),
            'kategoriKasus' => KategoriKasus::all(),
        ]);
    }

    public function register(Request $request){
        try{
            $request->validate([
                'nia' => 'required',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required',
                'alamat_kantor' => 'required',
                'kategori_kasus' => 'required|array',
                'kategori_kasus.*' => 'exists:kategori_kasus,id',
            ]);
    
            $pengacara = Pengacara::create([
                'user_id' => Auth::id(),
                'nia' => $request->nia,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'alamat_kantor' => $request->alamat_kantor,
                'is_verified' => false,
            ]);
            $user = User::find(Auth::id());
            $user->update([
                'usertype_id' => 2,
            ]);

            foreach ($request->kategori_kasus as $kategoriId) {
                advokat_kategori_kasus::create([
                    'advokat_id' => $pengacara->id,
                    'kategori_kasus_id' => $kategoriId,
                ]);
            }

            return Redirect::route('dashboard')->with('success', 'Pendaftaran mitra pengacara berhasil');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function getAllOffering()
    {
        $pengacara = Pengacara::where('user_id', Auth::id())->first();
        if ($pengacara) {
            $sewas = Sewa::where('pengacara_id', $pengacara->id)->get();

            $offering = [];
            foreach ($sewas as $sewa) {
                $offering[] = [
                    'id' => $sewa->id,
                    'user_id' => $sewa->user_id,
                    'user_name' => User::find($sewa->user_id)->name,
                    'user_email' => User::find($sewa->user_id)->email,
                    'user_no_hp' => User::find($sewa->user_id)->no_hp,
                    'topik_kasus' => $sewa->topik_kasus,
                    'deskripsi_kasus' => $sewa->deskripsi_kasus,
                    'fee' => $sewa->fee,
                    'status' => $sewa->status,
                ];
            }

            return view('pengacaraoffering', [
                'pengacara' => $pengacara,
                'sewas' => $offering,
            ]);
        } else {
            return Redirect::route('dashboard')->with('error', 'Anda bukan pengacara');
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
}
