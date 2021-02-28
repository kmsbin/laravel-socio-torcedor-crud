<?php

namespace App\Http\Controllers;

use App\Models\Clube;


use Illuminate\Http\Request;

class ClubesController extends Controller{
    public function listClubes() {
        return response()->json([Clube::all()]);
    }
    public function createClube(Request $request) {
        $clube = $request->input('nome_clube'); 
        // echo $clube;
        $ifexists = Clube::where('nome_do_clube', '=', $clube)->first();
        if($ifexists) {
            $data=[
                'status'=>'0',
                'msg'=>'clube já cadastrado'
            ];
            return response()->json($data);
        }
        $res = Clube::create([
            'nome_do_clube' => $clube
        ]);
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
    public function deleteClube(Request $request) {
        $clube = $request->input('nome_clube');
            $res = Clube::where('nome_do_clube','=',$clube)->delete();
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
