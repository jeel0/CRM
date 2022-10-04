<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ContactsExport;

use App\Imports\ContactsImport;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\Contact;

class ExcelCSVController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        return view('excel-csv-import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExcelCSV(Request $request)
    {
        $validatedData = $request->validate([

            'file' => 'required',

        ]);

        Excel::import(new ContactsImport, $request->file('file'));


        return redirect('excel-csv-file')->with('status', 'The file has been excel/csv imported to database in laravel 9');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exportExcelCSV($slug)
    {
        return Excel::download(new ContactsExport, 'users.' . $slug);
    }
}
