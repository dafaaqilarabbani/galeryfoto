<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateController extends Controller
{

    //Update Password
    public function update_password()
    {
        $data = [

        'dataprofile' => User::where('id',auth()->user()->id)->first()
      ];
        return view('pages.ubah_password', $data);

    }
    public function prosesupdate_pw(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $dataToUpdate = [
            'password' => bcrypt($request->input('new_password')),
        ];

        $user->update($dataToUpdate);
        Alert::success('Password Berhasil diubah');
        return redirect('/update_password');
    }

    //Update Profile
    public function profile()
    {

    $data = [
        'dataprofile' => User::where('id',auth()->user()->id)->first()
    ];
        return view('pages.update_profil', $data);
    }

    public function update_profile(Request $request)
    {
        $dataupdate = [
            'nama' => $request->nama,
            'username' => $request->username,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin
        ];
        User::where('id', auth()->user()->id)->update($dataupdate);
        Alert::success('Profile Berhasil Diperbaharui');
        return redirect('/profile');
    }
    public function fotoprofile(Request $request)
    {
        $filename = pathinfo($request->foto, PATHINFO_FILENAME);
        $extension = $request->foto->getClientOriginalExtension();
        $namafoto = 'foto' . time() . '.' . $extension;
        $request->foto->move('foto', $namafoto);
        //data
        $dataupdate = [
            'url'  =>$namafoto
        ];
        //proses update
        User::where('id', auth()->user()->id)->update($dataupdate);
        return redirect('/profile');
}
}
