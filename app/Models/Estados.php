<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

    protected $table = 'estados';

    protected $fillable = ['id', 'UF', 'name'];

    public function cidades()
    {
        return $this->hasMany(Cidades::class, 'estado_id', 'id');
    }
    public function rules($id = '')
    {
        return [
            'name'=> "required|min:3|max:200|unique:estados,name, {$id},id",
            'UF'=>'required|min:2'
        ];
    }
}
