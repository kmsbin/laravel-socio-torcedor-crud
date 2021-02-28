<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SocioClube;
use App\Models\Clube;
use App\Models\Socio;


class SociosClubesController extends Controller {
    public function listUsuariosClubes() {
        $data = [];
        foreach(SocioClube::all() as $associado) {
            array_push($data,  [
                'id_socio' => $associado['id_socio'],
                'id_clube' => $associado['id_clube'],
                'nome_completo' => Socio::where('id', '=', $associado['id_socio'])->first()['nome_completo'],
                'nome_do_clube' => Clube::where('id', '=', $associado['id_clube'])->first()['nome_do_clube'],
            ]);
        }
        return response()->json($data);

    }

    public function createUsuarioClube(Request $request) {
        $res = SocioClube::create([
            'id_socio' => $request->input('id_socio'),
            'id_clube' => $request->input('id_clube')
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
    public function createUsuarioNome(Request $request) {
        $nome = $request->input('nome');
        $clubeName = $request->input('nome_do_clube');
        $socio = Socio::where('nome_completo', $nome)->first();
        $clubes = Clube::where('nome_do_clube', $clubeName)->first();

        if( !isset($clubes) ) {
            $data=[
                'status'=>'0',
                'msg'=>'clube não existe'
            ];
            return response()->json($data);
        }
        if(!isset($socio)){
            $data=[
                'status'=>'1',
                'msg'=>'usuario cadastrado'
            ];

            $user = Socio::create([
                'nome_completo' => $nome
            ])->id;
            SocioClube::create([
                'id_socio' => $user,
                'id_clube' => $clubes['id']
            ]);
            return response()->json($data);
        }

        $ifexists = SocioClube::where('id_socio',$socio['id'])
            ->where('id_clube', $clubes['id'])
            ->first();
        if(isset($ifexists)) {
            $data=[
                'status'=>'1',
                'msg'=>'o usuario já esta cadastrado'
            ];
            return response()->json($data);
        }
        SocioClube::create([
            'id_socio' => $socio['id'],
            'id_clube' => $clubes['id']
        ]);
        $data=[
            'status'=>'1',
            'msg'=>'usuario e clube associados'
        ];

        return response()->json($data);
    }

    public function deleteUsuario(Request $request) {
        $socios = $request->input('id_socio');
        $clubes = $request->input('id_clube');
        
        $ifexists = SocioClube::where('id_socio',$socios)
            ->where('id_clube','=', $clubes)
            ->delete();
        if($ifexists) {
            
            $data=[
                'status'=>'1',
                'msg' => 'item deletado'
            ];
            return response()->json($data);
        }
        $data=[
            'status'=>'0',
            'msg' => 'item não existe'
        ];
        return response()->json($data);
    }

}
