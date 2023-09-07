<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Teknisi;
use Carbon\Carbon;

class ManagerController extends Controller
{
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
        return view('manager', ['teknisiList' => $teknisi]);
    }

      public function filter(Request $request){

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $teknisi = Teknisi::whereDate('tanggal_laporan','>=',$start_date)
                            ->whereDate('tanggal_laporan','<=',$end_date)
                            ->paginate(10);

        return view('manager', ['teknisiList' => $teknisi]);
    }

     public function viewdetail($id) 
    {
        $teknisi = Teknisi::findOrFail($id);
        return view('managerviewdetaillaporan', ['teknisi' => $teknisi]);
    }

     public function exportPdfAll()
    {
        $teknisi = Teknisi::all();
        $pdf = Pdf::loadView('pdf.alllaporan', ['teknisiList' => $teknisi]);
        return $pdf->download('alllaporan'.Carbon::now()->timestamp.'.pdf');
    }

    public function exportPdf($id)
    {
        $teknisi = Teknisi::findOrFail($id);
        $data = ['teknisi' => $teknisi];

        $pdf = Pdf::loadView('pdf.laporan', $data);
        return $pdf->download('laporan'.Carbon::now()->timestamp.'.pdf');
    }
}
