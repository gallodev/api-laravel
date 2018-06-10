<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Usuario;

class UserController extends Controller
{   
    protected $user = null;

    public function __construct(Usuario $user){
        $this->user = $user;
    }

    public function show($id){
        $users = $this->user->find($id);     
        return response()->json($users,200);
    }
    public function store(Request $request){
        $input = Input::all();    
        $input['SENHA'] = Hash::make($input['SENHA']);                
        $this->user->fill($input);
                
        $cadastro = $this->user->save();

        if($cadastro)
            return response()->json([
                            'sucesso'=>'Usuário cadastrado com sucesso',
                            'error' => false
                        ],200);
        else
            return response()->json([
                    'error' => 'Erro ao cadastrar usuário'
                ],403);            
        
    }
    public function index(){
        $users = $this->user->all();     
        return response()->json($users,200);
    }
    public function update($id){
        $input = Input::all();    
        $input['SENHA'] = Hash::make($input['SENHA']);                
        $atualizado = $this->user->atualizar_usuario($id,$input);
        
        if($atualizado)
            return response()->json([
                        'sucesso'=>"Registro " . $id . " atualizado com sucesso !",
                        'error' => false
            ],200);
        else
            return response()->json([
                    'error' => "Erro ao atualizar o registro ".$id
            ],403);
    }
    public function destroy($id){
        $deleted = $this->user->deletar_usuario($id);

        if($deleted)
            return response()->json([
                'sucesso' => "Registro deletado com sucesso !",
                "error" => false
            ],200);
        else 
            return response()->json([
                'error' => "Erro ao deletar o registro"
            ],403);            
    }
}
