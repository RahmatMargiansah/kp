<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Teknisi;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index(Request $request) 
    {
        $keyword = $request->keyword;

    	$teknisi = Teknisi::orderBy('tanggal_laporan', 'desc')
                        ->where('nik', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('wo', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('kategory', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('action', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('spbu', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('alamat_spbu', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('tanggal_laporan', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$keyword.'%')
                        ->paginate(10);
        return view('admin', ['teknisiList' => $teknisi]);
    }

    public function filter(Request $request){

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $teknisi = Teknisi::whereDate('tanggal_laporan','>=',$start_date)
                            ->whereDate('tanggal_laporan','<=',$end_date)
                            ->paginate(10);

        return view('admin', ['teknisiList' => $teknisi]);
    }

    public function detail(Request $request) 
    {
        $keyword = $request->keyword;

        $teknisi = Teknisi::orderBy('tanggal_laporan', 'desc')
                        ->where('nik', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('wo', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('kategory', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('action', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('spbu', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('alamat_spbu', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('tanggal_laporan', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$keyword.'%')
                        ->paginate(10);
        return view('detaillaporan', ['teknisiList' => $teknisi]);
    }

    public function viewdetail($id) 
    {
        $teknisi = Teknisi::findOrFail($id);
        return view('viewdetaillaporan', ['teknisi' => $teknisi]);
    }    

    public function edit(Request $request, $id)
    {
        $teknisi = Teknisi::findOrFail($id);
        return view('admin-edits', ['teknisi' => $teknisi]);
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
            Session::flash('message', 'Edit data laporan success');
        }
        return redirect('/admin');
    }

    public function delete($id)
    {
        $teknisi = Teknisi::findOrFail($id);
        return view('admin-delete', ['teknisi' => $teknisi]);
    }

    public function destroy($id)
    {
        $deleteTeknisi = Teknisi::findOrFail($id);
        $deleteTeknisi->delete();

        if($deleteTeknisi) {
            Session::flash('status', 'success');
            Session::flash('message', 'Delete data laporan success');
        }

        return redirect('/admin');
    }

    public function exportPdf($id)
    {
        $teknisi = Teknisi::findOrFail($id);
        $data = ['teknisi' => $teknisi];

        $pdf = Pdf::loadView('pdf.laporan', $data);
        return $pdf->download('laporan'.Carbon::now()->timestamp.'.pdf');
    }

    public function exportPdfAll()
    {
        $teknisi = Teknisi::all();
        $pdf = Pdf::loadView('pdf.alllaporan', ['teknisiList' => $teknisi]);
        return $pdf->download('alllaporan'.Carbon::now()->timestamp.'.pdf');
    }
}
