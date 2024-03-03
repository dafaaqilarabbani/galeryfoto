<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Like;
use App\Models\Komentar;
use App\Models\Album;
use App\Models\Report;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminds(Request $request)
    {
        $datausersdet = User::where('role','users')->orderby('id','DESC')->get();
        $datausers          = User::where('role' , 'users')->count();
        $dataalbum          = Album::all()->count();
        $dataupload         = Foto::all()->count();
        $datareport         = Report::all()->count();
        return view('admin.adminds', compact('datausersdet','datausers', 'dataalbum','dataupload','datareport'));
    }
    public function dataalbum()
    {

    $dataalbum = Album::with('user')->get();

    return view('admin.dataalbum', compact('dataalbum'));
    }
    public function datareport()
    {
        $dataupload = Report::with('user', 'foto')->get();

        return view('admin.datareport', compact('dataupload'));
    }

    public function hapususer(Request $request, $id) {
        $user = User::findOrFail($id);

        $user->Report()->delete();

        foreach ($user->Album as $album) {
            foreach ($album->foto as $foto) {
                $foto->Report()->delete();
                $foto->Komentar()->delete();
                $foto->Like()->delete();
                $foto->delete();
            }
            $album->delete();
        }

        $user->like()->delete();

        $user->Komentar()->delete();
        $user->foto()->delete();
        $user->delete();
        Alert::success('User Berhasil di Hapus');
        return redirect('/adminds');
    }


public function hapusalbum(Request $request, $id)
{
    try {
        // Dapatkan album berdasarkan ID
        $album = Album::findOrFail($id);

        // Hapus semua foto yang terkait dengan album
        foreach ($album->foto as $foto) {
            // Hapus semua like yang terkait dengan foto
            $foto->like()->delete();

            $foto->report()->delete();
            // Hapus semua komentar yang terkait dengan foto
            $foto->komentar()->delete();

            // Hapus foto itu sendiri
            $foto->delete();
        }

        // Hapus album
        $album->delete();

        // Redirect ke halaman admin setelah penghapusan berhasil
        return redirect('/dataalbum')->with('success', 'Album berhasil dihapus');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Tangani jika album tidak ditemukan
        return redirect('/dataalbum')->with('error', 'Album tidak ditemukan');
    } catch (\Exception $e) {
        // Tangani kesalahan umum
        return redirect('/dataalbum')->with('error', 'Terjadi kesalahan saat menghapus album');
    }

}


public function hapusreport(Request $request, $id, Foto $foto) {

       if($foto->users_id != auth()->user()->id) {
            return back();
        }

        try {
            DB::beginTransaction();

            Like::where('foto_id', $foto->id)->delete();

            Foto::where('album_id', $foto->id)->delete();

            Komentar::where('foto_id', $foto->id)->delete();

            Report::where('foto_id', $foto->id)->delete();

            $foto->delete();

            DB::commit();
            Alert::success('Foto Berhasil diHapus');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('gagal Menghapus Foto');
            return redirect()->back();
        }
    }


public function logoutdiadmin(Request $request)
{
                // proses penghancuran session
                $request->session()->invalidate();
                // proses pembuatan session baru
                $request->session()->regenerate();
                // menampilkan halaman utama setelah logout
                Alert::success('Berhasil Log out');
                return redirect('/');
}
}
