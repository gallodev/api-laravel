<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Usuario extends Model
{
    protected $table = "TB_USER";
    protected $hidden = ['SENHA'];
    public $timestamps = false;
    protected $fillable = ['NOME','SOBRENOME','EMAIL','SENHA'];
    
    public function atualizar_usuario($id,$arr){
        return DB::table($this->table)->where('ID',$id)->update($arr);
    }

    public function deletar_usuario($id){
        return DB::table($this->table)->where('ID',$id)->delete();
    }

    

}
