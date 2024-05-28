<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Spatie\Activitylog\Models\Activity;

class InventarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventario = Inventario::all();
        return view('inventarios.index', compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $request->validate([
            'cant_inicial' => 'required|unique:inventarios',
            'cant_disponible' => 'required|unique:inventarios'
        ]);*/
        
        
        $inventario = new Inventario();
        $inventario->cant_inicial = $request->input('cant_inicial');
        $inventario->cant_disponible = $request->input('cant_disponible');
        $inventario->save();
        //bitacora
        activity()->useLog('gestionar inventario')->log('Registro')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $inventario->id;
        $lastActivity->save();
        return redirect()->route('inventarios.index', $inventario);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventario = Inventario::findOrFail($id);
        //bitacora
        activity()->useLog('gestionar inventario')->log('Edito')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $inventario->id;
        $lastActivity->save();
        return view('inventarios.edit', compact('inventario'));
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
       /* $request->validate([
            'cant_inicial' => 'required|unique:inventarios',
            'cant_disponible' => 'required|unique:inventarios'
        ]);*/
        $inventario = Inventario::findOrFail($id);

        $inventario->cant_inicial = $request->input('cant_inicial');
        $inventario->cant_disponible = $request->input('cant_disponible');
        $inventario->save();
        return redirect()->route('inventarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventario = Inventario::findOrFail($id);
        $inventario->delete();
        //bitacora
        activity()->useLog('gestionar inventario')->log('Elimino')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $inventario->id;
        $lastActivity->save();
        return redirect()->route('inventarios.index');
    }
}
