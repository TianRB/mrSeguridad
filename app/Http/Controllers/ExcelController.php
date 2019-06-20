<?php

namespace App\Http\Controllers;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function importUsers(Request $request)
    {
        $input = $request->all();

        $rules = [
         'excel' => 'required|mimes:xlsx',
        ];
       $validator = Validator::make($input, $rules);
       if ( $validator->fails() ) {
       return redirect()->back()
                   ->withErrors( $validator )
                   ->withInput();
        } else {  
            $file = $request->file('excel');
            $users = Excel::import(new UsersImport, $file);
        }
        dd('Usuarios Importados Exitosamente');
    }
}
