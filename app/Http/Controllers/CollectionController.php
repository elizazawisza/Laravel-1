<?php

namespace App\Http\Controllers;

use App\Kolekcja;
use App\Http\Requests\CollectionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$kolekcja = Kolekcja::orderBy('kolejka','asc')->get();
        return view('index2');

    }

    public function apiIndex()
    {
        $kolekcja = Kolekcja::orderBy('kolejka','asc')->get();
        return response()->json($kolekcja);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index2');
    }
    public function apiCreate(){
        return view('index2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionRequest $request)
    {
        $telefon = new \App\Kolekcja;
        $telefon->nazwa=$request->get('nazwa');
        $telefon->rok=$request->get('rok');
        $telefon->cena=$request->get('cena');
        $telefon->pamiec=$request->get('pamiec');
        $telefon->kolor=$request->get('kolor');
        $telefon->przekatna=$request->get('przekatna');
        $telefon->zdjecie='';
        $data = (array)Kolekcja::all();
        $data = array_filter($data);
        if(empty($data)){
            $telefon->kolejka=1;
            $telefon->save();
        }else{
            $tmp = Kolekcja::all()->last()->kolejka;
            $telefon->kolejka=$tmp+1;
            $telefon->save();
        }
        return redirect('kolekcja');
    }

    public function apiStore(CollectionRequest $request)
    {
        $telefon = new \App\Kolekcja;
        $telefon->nazwa=$request->get('nazwa');
        $telefon->rok=$request->get('rok');
        $telefon->cena=$request->get('cena');
        $telefon->pamiec=$request->get('pamiec');
        $telefon->kolor=$request->get('kolor');
        $telefon->przekatna=$request->get('przekatna');
        $telefon->zdjecie='';
        $data = (array)Kolekcja::all();
        $data = array_filter($data);
        if(empty($data)){
            $telefon->kolejka=1;
            $telefon->save();
        }else{
            $tmp = Kolekcja::all()->last()->kolejka;
            $telefon->kolejka=$tmp+1;
            $telefon->save();
        }
        return redirect('kolekcja');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('index2');
        $kolekcja = Kolekcja::find($id);
        //dd(response()->json($kolekcja));
        return response()->json($kolekcja);
    }

    public function apiShow($id)
    {
        $kolekcja = Kolekcja::find($id);
        //dd(response()->json($kolekcja));
        return response()->json($kolekcja);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('index2');
        $kolekcja = Kolekcja::find($id);
        //dd(response()->json($kolekcja));
        return response()->json($kolekcja);
    }
    public function apiEdit($id)
    {
        $kolekcja = Kolekcja::find($id);
        //dd(response()->json($kolekcja));
        return response()->json($kolekcja);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionRequest $request, $id)
    {
        $kolekcja= Kolekcja::find($id);
        $kolekcja->nazwa=$request->get('nazwa');
        $kolekcja->rok=$request->get('rok');
        $kolekcja->cena=$request->get('cena');
        $kolekcja->pamiec=$request->get('pamiec');
        $kolekcja->kolor=$request->get('kolor');
        $kolekcja->przekatna=$request->get('przekatna');
        if($request->file('zdjecie')!=''){
            if($kolekcja->zdjecie!=''){
                $delete = Storage::disk('public')->delete('zdjecia/' . $kolekcja->zdjecie);
            }
            $zdjecie = $request->file('zdjecie')->getClientOriginalName();
            Storage::disk('public')->putFileAs('zdjecia',$request->file('zdjecie'),$zdjecie);
            $kolekcja->zdjecie =$zdjecie;
        }
        $kolekcja->save();
        return response()->json(['success'=>true]);
    }

    public function apiPhotoUpdate(CollectionRequest $request, $id)
    {
        $kolekcja= Kolekcja::find($id);

        if($request->file('zdjecie')!=''){
            if($kolekcja->zdjecie!=''){
                $delete = Storage::disk('public')->delete('zdjecia/' . $kolekcja->zdjecie);
            }
            $zdjecie = $request->file('zdjecie')->getClientOriginalName();
            Storage::disk('public')->putFileAs('zdjecia',$request->file('zdjecie'),$zdjecie);
            $kolekcja->zdjecie =$zdjecie;
        }
        $kolekcja->save();
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
        $kolekcja = Kolekcja::find($id);
        if($kolekcja->zdjecie!=''){
            $delete = Storage::disk('public')->delete('zdjecia/' . $kolekcja->zdjecie);
        }
        $kolekcja->delete();
        $elementy = Kolekcja::all();
        $i=1;
        foreach ($elementy as $element){
            $element->kolejka = $i;
            $i++;
            $element->save();
        }
        return redirect('kolekcja');
    }

    public function changeOrder(Request $request){
        /**
         * [['id'=>,'kolejka'=>],[]]
         */

        $request->data;
        foreach($request->data as $v){
            $kolekcja = Kolekcja::find($v['id']);
            $kolekcja->kolejka = $v['kolejka'];
            $kolekcja->save();
        }
        return response()->json(['success'=>true]);
    }

}
