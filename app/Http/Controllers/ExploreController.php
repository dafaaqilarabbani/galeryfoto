<?php

namespace App\Http\Controllers;

use App\Models\Followers;
use App\Models\Foto;
use App\Models\Like;
use App\Models\User;
use App\Models\Album;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\FlareClient\View;

class ExploreController extends Controller
{
    public function getdata(Request $request)
    {
        if ($request->cari !== 'null') {
            $explore = Foto::with(['Like','User'])->where('judul_foto', 'like', '%'.$request->cari.'%')->with(['Like','Komentar'])->orderby('id', 'DESC')->paginate();
        }else{
            $explore = Foto::with(['Like','User'])->withCount(['Like','Komentar'])->orderby('id', 'DESC')->paginate();

        }
        return response()->json([
            'data' => $explore,
            'statuscode' => 200,
            'idUser'    => auth()->user()->id
        ]);
    }
    public function likesfoto(Request $request)
    {
        // $data = [
        //     'idfoto'    => $request->idfoto,
        //     'userid'    => auth()->user()->id
        // ];
        // return response()->json([
        //     'data'  => $data
        // ]);
        try {
            $request->validate([
                'idfoto' => 'required'
            ]);
            $existingLike = Like::where('foto_id', $request->idfoto)->where('users_id', auth()->user()->id)->first();
            if(!$existingLike){
                $dataSimpan = [
                    'foto_id'   => $request->idfoto,
                    'users_id'   => auth()->user()->id
                ];
                Like::create($dataSimpan);
            } else {
                Like::where('foto_id', $request->idfoto)->where('users_id', auth()->user()->id)->delete();
            }

            return response()->json('Data berhasil di simpan', 200);
        } catch (\Throwable $th) {
            return response()->json('Something want wrong', 500,);
        }

    }
    //Detail
    public function getdatadetail(Request $request, $id){
        $dataDetailFoto     = Foto::with(['user'])->where('id', $id)->firstOrFail();
        $dataJumlahPengikut = DB::table('followers')->selectRaw('count(id_following) as jmlfolow')->where('id_following', $dataDetailFoto->user->id)->first();
        $dataFollow         = Followers::where('id_following', $dataDetailFoto->user->id)->where('users_id', auth()->user()->id)->first();
        return response()->json([
            'dataDetailFoto'    => $dataDetailFoto,
            'dataJumlahFollow'  => $dataJumlahPengikut,
            'dataUser'          => auth()->user()->id,
            'dataFollow'        => $dataFollow,
        ], 200);
    }

    //Ambil Komentar
    public function ambildatakomentar(Request $request, $id){
        $ambilkomentar = Komentar::with('user')->where('foto_id', $id)->get();
        return response()->json([
            'data'  => $ambilkomentar,
        ], 200);
    }

    //Kirim Komentar
    public function kirimkomentar(Request $request){
        try {
            $request->validate([
                'idfoto'   => 'required',
                'isi_komentar'  => 'required',
            ]);
            $dataStoreKomentar = [
                'users_id'  => auth()->user()->id,
                'foto_id'   => $request->idfoto,
                'isi_komentar'  => $request->isi_komentar,
            ];
            Komentar::create($dataStoreKomentar);
            return response()->json([
                'data'      => 'Data berhasil di simpan',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json('Data komentar  gagal di simpann', 500);
        }
    }
        public function ikuti(Request $request)
        {
            try {
                $request->validate([
                    'idfollow' => 'required',
                ]);
                $existingFollow = Followers::where('users_id', auth()->user()->id)->where('id_following', $request->idfollow)->first();
                if(!$existingFollow){
                    $dataSimpan = [
                        'users_id'      => auth()->user()->id,
                        'id_following'  => $request->idfollow,
                    ];
                    Followers::create($dataSimpan);
                } else {
                    Followers::where('users_id', auth()->user()->id)->where('id_following', $request->idfollow)->delete();
                }
                return response()->json('Data berhasil di eksekusi', 200);
            } catch (\Throwable $th) {
                return response()->json('Something went wrong', 500);
            }
        }   
        public function profile_publik(Request $request, $id)
        {
            $user = User::find($id);
            $datafollowers = DB::table('followers')->where('id_following', $id)->count();
            $tampilAlbum = Album::with('Foto')->where('users_id', $id)->get();

            $datafollowCount = DB::table('followers')->where('users_id', $user->id)->count();
            return View('pages.profil-public', [
                'username' => $user->username,
                'url' => $user->url,
                'user_id'   => $id,
                'followers_id' => Followers::where('id_following', $id)->pluck('users_id')->toArray(),
                'following_count' => $datafollowCount,
                'followers_count' => $datafollowers,
                'dataalbum' => $tampilAlbum,
            ]);

        }
        public function getdatapublic(Request $request, $id)
        {
                  $public = auth()->user()->id;
                  $explore = Foto::with(['Like','User'])->withCount(['Like','Komentar'])->where('users_id', $id)->paginate();
                  return response()->json([
                        'data' => $explore,
                        'statuscode' => 200,
                        'idUser'    => auth()->user()->id
]);
        }
        public function likesfotopublik(Request $request)
    {
        // $data = [
        //     'idfoto'    => $request->idfoto,
        //     'userid'    => auth()->user()->id
        // ];
        // return response()->json([
        //     'data'  => $data
        // ]);
        try {
            $request->validate([
                'idfoto' => 'required'
            ]);
            $existingLike = Like::where('foto_id', $request->idfoto)->where('users_id', auth()->user()->id)->first();
            if(!$existingLike){
                $dataSimpan = [
                    'foto_id'   => $request->idfoto,
                    'users_id'   => auth()->user()->id
                ];
                Like::create($dataSimpan);
            } else {
                Like::where('foto_id', $request->idfoto)->where('users_id', auth()->user()->id)->delete();
            }

            return response()->json('Data berhasil di simpan', 200);
        } catch (\Throwable $th) {
            return response()->json('Something want wrong', 500,);
        }


    }
    public function dalemanpublic($id)
    {
        $user = User::find($id);
        return view('pages.daleman_public' , [
            'users_id'   => $id,
        ]);
    }
    public function ikutidipublic(Request $request)
        {
            try {
                $request->validate([
                    'idfollow' => 'required',
                ]);
                $existingFollow = Followers::where('users_id', auth()->user()->id)->where('id_following', $request->idfollow)->first();
                if(!$existingFollow){
                    $dataSimpan = [
                        'users_id'      => auth()->user()->id,
                        'id_following'  => $request->idfollow,
                    ];
                    Followers::create($dataSimpan);
                } else {
                    Followers::where('users_id', auth()->user()->id)->where('id_following', $request->idfollow)->delete();
                }
                return response()->json('Data berhasil di eksekusi', 200);
            } catch (\Throwable $th) {
                return response()->json('Something went wrong', 500);
            }
}
}
