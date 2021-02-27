<?php

namespace App\Http\Controllers;

use App\Models\Socio;

use Illuminate\Http\Request;

class SociosController extends Controller {
    public function index() {
        // $res = foreach (Socio::all() as $socio) {
        //     echo $socio->nome_completo."  ------   ";
        // };
        return Socio::all();
    }
    public function create(Request $request) {
        $name = $request->input('nome_completo');
        Socio::create([
            'nome_completo' => $name
        ]);
    }
    public function delete(Request $request) {

        $res = Socio::where('nome_completo','=',$request->input('name'))->delete();
        if ($res){
          $data=[
          'status'=>'1',
          'msg'=>'success'
        ];
        return response()->json($data);
        }else{
            $data=[
                'status'=>'0',
                'msg'=>'fail'
            ];
            return response()->json($data);
        }
    }
}
