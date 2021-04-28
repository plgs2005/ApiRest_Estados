<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    use HasFactory;


    protected $fillable = ['id', 'estado_id', 'cidade'];


    public function endereco()
    {
        return $this->hasOne(Estados::class, 'id');
    }

    public function estado()
    {
        return $this->belongsTo(Estados::class, 'estado_id','id');
    }

    public function rules()
    {
        return [
            'cidade'=> "required|min:3|max:200|unique:cidades" ,
            'estado_id'=>'required|min:1'

        ];
    }
}
