<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function detailfoto($id)
    {
        $data = [
            'dataprofile' => User::where('id',auth()->user()->id)->first(),
            'foto' => Foto::whereId($id)->first()
        ];
        return view('pages.detail_foto', $data);
    }
}
