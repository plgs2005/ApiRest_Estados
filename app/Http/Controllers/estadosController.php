<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEstados;
use App\Models\Estados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class estadosController extends Controller
{

    public function index()
    {
        $estados = Estados::paginate();
        return view('estados.index', [
            'estados' => $estados,
        ]);
    }

    public function create()
    {
        $estados = Estados::all();

        return view('estados.create', compact('estados'));
    }

    public function store(StoreUpdateEstados $request)
    {
        $filters = $request->except('_token');


        $estados = Estados::where('name', 'LIKE', "{$request->estado}")
            ->orWhere('UF', 'LIKE', "{$request->UF}")
            ->exists();


        if ($estados) {
            return redirect()
                ->route('estados.create')
                ->with('error', 'Estado já cadastrado com este Nome e esta Sigla');
        } else {


            Estados::create([
                'name' => $request->estado,
                'UF' => $request->UF
            ]);


            return redirect()
                ->route('estados.index')
                ->with('success', 'Estado cadastrado com sucesso');
        }
    }


    public function show($id)
    {
        $consulta = Estados::findOrFail($id);
        if (!$consulta) {
            return redirect()->route('estados.index');;
        } else {
            return view('estados.show', compact('consulta'));
        }
    }


    public function edit(Request $request, $id)
    {
        if (!$estado = Estados::find($id)) {
            return redirect()->back();
        }

        return view('estados.edit', compact('estado'))
            ->with('success', 'Estado Editado com sucesso');
    }


    public function update(Request $request, $id)
    {
        if (!$estados = Estados::find($id)) {
            return redirect()->back();
        }

        $estados->update([
            'name' => $request->estado . PHP_EOL,
            'UF' => $request->UF . PHP_EOL

        ]);
        return redirect()
            ->route('estados.index')
            ->with('success', 'Estado atualizado com sucesso');
    }


    public function destroy($id)
    {
        if (!$estados = Estados::find($id))
            return redirect()->route('estados.index')->with('error', 'Estado inexistente');


        $estados->delete();

        return redirect()
            ->route('estados.index')
            ->with('success', 'Estado deletado com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $estados = Estados::where('name', 'LIKE', "%{$request->search}%")
            ->orWhere('UF', 'LIKE', "%{$request->search}%")
            ->paginate(15);


        if ($estados->isEmpty()) {
            return redirect()
                ->route('estados.index')
                ->with('warning', 'Estado Não cadastrado');
        }
       
        return view('estados.index', compact('estados', 'filters'));
    }
}
