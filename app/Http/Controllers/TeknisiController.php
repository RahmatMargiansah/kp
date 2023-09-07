<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Teknisi;


class TeknisiController extends Controller
{
	public function index()
	{
        $teknisi = Teknisi::orderBy('tanggal_laporan', 'desc')->paginate(10);
        return view('teknisi', ['teknisiList' => $teknisi]);
	}

    public function create()
    {
    	return view('teknisi-add');
    }

    public function store(Request $request)
    {
        $newName = '';

        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;

    	$teknisi = new Teknisi;
        $teknisi->nik = $request->nik;
        $teknisi->name = $request->name;
        $teknisi->wo = $request->wo;
        $teknisi->kategory = $request->kategory;
        $teknisi->action = $request->action;
        $teknisi->spbu = $request->spbu;
        $teknisi->alamat_spbu = $request->alamat_spbu;
        $teknisi->tanggal_laporan = $request->tanggal_laporan;
        $teknisi->keterangan = $request->keterangan;
        $teknisi->image = $request->image;
        $teknisi->save();

        if($teknisi) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add data laporan success');
        }

        return redirect('/teknisi');
    }

    public function edit(Request $request, $id)
    {
        $teknisi = Teknisi::findOrFail($id);
        return view('teknisi-edits', ['teknisi' => $teknisi]);
    }

    public function update(Request $request, $id)
    {
        $newName = '';
        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;

        $teknisi = Teknisi::findOrfail($id);
        $teknisi->nik = $request->nik;
        $teknisi->name = $request->name;
        $teknisi->wo = $request->wo;
        $teknisi->kategory = $request->kategory;
        $teknisi->action = $request->action;
        $teknisi->spbu = $request->spbu;
        $teknisi->alamat_spbu = $request->alamat_spbu;
        $teknisi->tanggal_laporan = $request->tanggal_laporan;
        $teknisi->keterangan = $request->keterangan;
        $teknisi->image = $request->image;
        $teknisi->save();

        if($teknisi) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit update data laporan success');
        }
        return redirect('/teknisi');
    }

    public function delete($id)
    {
        $teknisi = Teknisi::findOrFail($id);
        return view('teknisi-delete', ['teknisi' => $teknisi]);
    }

    public function destroy($id)
    {
        $deleteTeknisi = Teknisi::findOrFail($id);
        $deleteTeknisi->delete();

        if($deleteTeknisi) {
            Session::flash('status', 'success');
            Session::flash('message', 'Delete data laporan success');
        }

        return redirect('teknisi');
    }
}
