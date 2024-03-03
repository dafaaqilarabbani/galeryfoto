<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Like;
use App\Models\User;
use App\Models\Album;
use App\Models\Komentar;
use App\Models\Followers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AlbumController extends Controller
{
    PUBLIC function prosestambah_album(Request $request)
    {
        $data = [
            'users_id' => auth()->user()->id,
            'judul_album' => $request->album
        ];
    Album::create($data);
    return redirect('/upload_foto');
    }
    PUBLIC function prosestambah_album1(Request $request)
    {
        $data = [
            'users_id' => auth()->user()->id,
            'judul_album' => $request->album
        ];
    Album::create($data);
    Alert::success('Album Berhasil di Tambahkan ');
    return redirect('/album');
    }
    public function dalemanalbum($id)
    {
        $album =album::with('foto')->orderby('id','DESC')->FindOrFail($id);
       return view('pages.daleman_album' , compact('album'));
    }
    public function album(){
        $tampilUpload = Foto::with('Album')->where('users_id', auth()->user()->id)->orderby('id', 'DESC')->get();
        $tampilAlbum = Album::with('Foto')->where('users_id', auth()->user()->id)->get();
        $profile = User::where('id', auth()->user()->id)->first();
        $datafollowers = DB::table('followers')->where('id_following', auth()->user()->id)->count();
        $datafollowCount = DB::table('followers')->where('users_id', auth()->user()->id)->count();
        return view('pages.profil_dan_album', compact('tampilUpload', 'tampilAlbum','profile', 'datafollowers','datafollowCount'));
    }
    public function hapusfoto(Request $request, Foto $foto)
    {
        if($foto->users_id != auth()->user()->id) {
            return back();
        }

        try {
            DB::beginTransaction();

            Like::where('foto_id', $foto->id)->delete();

            Komentar::where('foto_id', $foto->id)->delete();

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
    public function hapusfotodialbum(Request $request, Foto $foto)
    {
        if($foto->users_id != auth()->user()->id) {
            return back();
        }

        try {
            DB::beginTransaction();

            Like::where('foto_id', $foto->id)->delete();

            Komentar::where('foto_id', $foto->id)->delete();

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
public function hapusalbum(Request $request, $id) {
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
        return redirect('/album')->with('success', 'Album berhasil dihapus');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Tangani jika album tidak ditemukan
        return redirect('/album')->with('error', 'Album tidak ditemukan');
    } catch (\Exception $e) {
        // Tangani kesalahan umum
        return redirect('/album')->with('error', 'Terjadi kesalahan saat menghapus album');
    }
}
}


