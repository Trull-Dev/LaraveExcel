<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entreprise;
use App\Exports\EntreprisesExport;
use App\Imports\EntreprisesImport;
use Maatwebsite\Excel\Facades\Excel;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprises = Entreprise::all()->sortBy('numero');
        return view('entreprises.index', compact('entreprises'));
    }

    public function export()
    {
        return Excel::download(new EntreprisesExport, 'entreprises.xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'fichier'  => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new EntreprisesImport, $request->file('fichier'));

        return redirect('/')->with('success', 'Importation réussie!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        if ($request->ajax()) {
            $data = array(
                'numero' => $request->numero,
                'denomination' => $request->denomination,
                'adresse' => $request->adresse,
                'telephone' => $request->telephone,
            );
            Entreprise::find($id)->update($data);
            return response()->json([
                'success' => 'Modification réussie',
                'valeur' => 1
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entreprise::find($id)->delete($id);

        return response()->json([
            'success' => 'Suppression réussie'
        ]);
    }
}
