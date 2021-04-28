<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCidades;
use App\Models\Cidades;
use App\Models\Estados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

use function PHPUnit\Framework\isNull;

class cidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidades::with('estado')->paginate(15);
        // $cidades = Cidades::paginate(15);

        //$cidades = Cidades::paginate('estado')->get();

        return view('cidades.index', [
            'cidades' => $cidades,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estados::all();

        return view('cidades.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCidades $request)
    {

        $filters = $request->except('_token');


        $cidades = Cidades::with('estado')
            ->where('cidade', 'LIKE', "{$request->cidade}")
            ->Where('estado_id', '=', "{$request->estado}")
            ->exists();


        if ($cidades) {

            return redirect()
                ->route('cidades.create')
                ->with('error', 'Cidade já cadastrada para este Estado');
        } else {


            Cidades::create(
                [
                    'cidade' => $request->cidade,
                    'estado_id' => $request->estado

                ],
            );

        


            return redirect()
                ->route('cidades.index')
                ->with('success', 'Cidade cadastrada com sucesso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = Cidades::with('estado')->findOrFail($id);
        if (!$consulta) {
            return redirect()->route('cidades.index');;
        } else {
            return view('cidades.show', compact('consulta'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        if (!$cidade = Cidades::find($id)) {
            return redirect()->back();
        }

        $estados = Estados::all();

        return view('cidades.edit', compact('cidade', 'estados'))
            ->with('success', 'Cidade Editada com sucesso');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (!$cidade = Cidades::find($id)) {
            return redirect()->back();
        }

        $data = $request->all();


        $cidade->update($data);

        return redirect()
            ->route('cidades.index')
            ->with('success', 'Cidade atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$cidade = cidades::find($id))
            return redirect()->route('cidades.index');


        $cidade->delete();

        return redirect()
            ->route('cidades.index')
            ->with('success', 'Cidade Deletada com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $cidades = Cidades::with('estado')
            ->where('cidade', 'LIKE', "%{$request->search}%")
            ->paginate(15);

        if ($cidades->isEmpty()) {
            return redirect()
                ->route('cidades.index')
                ->with('warning', 'Cidade Não cadastrada');
        }

        $duble = DB::table('cidades')
            ->select('cidade, estado, id')
            ->groupBy('cidade')
            ->havingRaw('count(id) > 1')
            ->count();

        if ($duble) {
            return view('cidades.index', compact('cidades', 'filters', 'duble'));
        } else {
            return view('cidades.index', compact('cidades', 'filters'));
        }
    }
}
