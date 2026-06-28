<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distributor;
use App\Imports\DistributorImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class DistributorController extends Controller
{
    // =====================
    // INDEX
    // =====================
    public function index()
    {
        $distributors = Distributor::all();

        return view('pages.admin.distributor.index', compact('distributors'));
    }

    // =====================
    // CREATE (FIX ERROR KAMU)
    // =====================
    public function create()
    {
        return view('pages.admin.distributor.create');
    }

    // =====================
    // IMPORT EXCEL
    // =====================
    public function import(Request $request)
    {
        try {
            $file = $request->file('file');

            Excel::import(new DistributorImport, $file);

            Alert::success('Berhasil!', 'Data berhasil di import!');
        } 
        catch (\Maatwebsite\Excel\Validators\ValidationException $e) {

            $failures = $e->failures();
            $messages = '';

            foreach ($failures as $failure) {
                $messages .= 'Kesalahan baris ' . $failure->row() . ': ' 
                    . implode(', ', $failure->errors()) . '. ';
            }

            Alert::error('Gagal!', $messages);
        } 
        catch (\Exception $e) {

            Alert::error('Error', 'Terjadi kesalahan: ' . $e->getMessage());
        } 
        finally {
            return redirect()->back();
        }
    }

    // =====================
    // EXPORT PDF
    // =====================
    public function export()
    {
        $distributors = Distributor::all();

        $pdf = Pdf::loadView(
            'pages.admin.distributor.export',
            compact('distributors')
        )->setPaper('a4', 'landscape');

        return $pdf->download('distributor.pdf');
    }
}