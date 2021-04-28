<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cidades;

class CidadesController extends Controller
{
    private $cidades;

    public function __construct(Cidades $request)
    {
        $this->cidades = $request;
    }

    public function index()
    {
        $cidades = $this->cidades->paginate(5);
        return response()->json($cidades);
    }


    public function store(Request $request)
    {
        try {
            $data = $request->all();

        $validate = validator($data, $this->cidades->rules());

        if ($validate->fails()) {
            $messages = $validate->messages();
            return response()->json(['validade.error', $messages]);
        }

        if (!$insert = $this->cidades->create($data))
            return response()->json(['error' => 'Error_insert'], 500);

        return response()->json($insert);
        } catch (\Throwable $th) {
            return ["return"=>'erro', 'details'=>$th];
        }

        
    }


    public function show($id)
    {
        try {
            if (!$cidades = $this->cidades::find($id)) {
                return response()->json(['error' => 'not_found']);
            }
    
            return response()->json(["cidades" => $cidades]);
        } catch (\Throwable $th) {
            return ["return"=>'erro', 'details'=>$th];
        }

       
    }



    public function update(Request $request, $id)
    {
        try {
            
            $data = $request->all();
        
        $validate = validator($data, $this->cidades->rules());

        if ($validate->fails()) {
            $messages = $validate->messages();
            return response()->json(['validade.error', $messages]);
        }

        if (!$cidades = $this->cidades::find($id)) {
            return response()->json(['error' => 'not_found']);
        }


        if (!$update = $cidades->update($data)) {

            return response()->json(['error' => 'not_update'], 500);
        }

        return response()->json(['Response', $update]);

        } catch (\Throwable $th) {
            return ["return"=>'erro', 'details'=>$th];
        }


        
    }


    public function destroy($id)
    {
        try {
            if (!$cidades = $this->cidades::find($id)) {
                return response()->json(['error' => 'not_found']);
            }
    
    
            if (!$delete = $cidades->delete($id)) {
    
                return response()->json(['error' => 'not_deleted'], 500);
            }
    
            return response()->json(['Response', $delete]);
        } catch (\Throwable $th) {
            return ["return"=>'erro', 'details'=>$th];
        }
        
    }
}