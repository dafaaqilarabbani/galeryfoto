<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Report;
use App\Models\Album;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function report($id)
    {
        $foto = Foto::find($id);

        if (!$foto) {
            abort(404);
        }
        return view('pages.report', compact('foto'));
    }
    public function kirimreport(Request $request, $id) {
        $foto = Foto::find($id);
        $album = Album::find($id);

        if (!$foto) {
            abort(404);
        }
        $validatedata = $request->validate([
            'keterangan' => 'required'
        ]);

        $report = Report::create([
            'users_id' => auth()->user()->id,
            'foto_id' => $foto->id,
            'keterangan' => $validatedata['keterangan']
        ]);
        Alert::success('Laporan Berhasil di Kirim');
        return redirect('/beranda_user');
    }

}
