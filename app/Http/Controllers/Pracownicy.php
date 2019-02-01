<?php

namespace App\Http\Controllers;

use App\Http\Requests\PracownikRequest;
use Illuminate\Http\Request;
use App\Pracownik;

class Pracownicy extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Pracownik::with('kolekcja')->get()->all());
        $pracownik = Pracownik::with('kolekcja')->get()->all();
        return view('indexPracownicy');
    }
    public function apiIndex()
    {
        $pracownicy = Pracownik::with('kolekcja')->get()->all();
        //$pracownicy = Pracownik::all();
        //dd(Pracownik::with('kolekcja')->get()->all());
        return response()->json($pracownicy);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createPracownicy');
    }

    /**
     * store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PracownikRequest $request)
    {
        $pracownik = new \App\Pracownik;
        $pracownik->imie=$request->get('imie');
        $pracownik->nazwisko=$request->get('nazwisko');
        $pracownik->email=$request->get('email');
        $pracownik->numer_telefonu=$request->get('numer_telefonu');
        $pracownik->save();

        return redirect('pracownicy');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pracownik = Pracownik::find($id);
        return view('showPracownik', compact('pracownik'));
    }
    public function ApiShow($id)
    {
        $pracownik = Pracownik::find($id);
        return response()->json($pracownik);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('indexPracownicy');
        //$pracownik = Pracownik::find($id);

        //return response()->json($pracownik);
    }

    public function ApiEdit($id)
    {
        $pracownik = Pracownik::with('kolekcja')->find($id);
        return response()->json($pracownik);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PracownikRequest $request, $id)
    {
        $pracownik= Pracownik::find($id);
        $pracownik->imie=$request->get('imie');
        $pracownik->nazwisko=$request->get('nazwisko');
        $pracownik->email=$request->get('email');
        $pracownik->numer_telefonu=$request->get('numer_telefonu');
        $pracownik->save();
        $telefon_id = explode(',',$request->get('telefon_id'));
        //print_r($telefon_id);
        $pracownik->kolekcja()->sync($telefon_id);
        return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pracownik = Pracownik::find($id);
        $pracownik->delete();
        return redirect('pracownicy');
    }
}
