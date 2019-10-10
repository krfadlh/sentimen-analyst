<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\opinions;

class OpinionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $opinions = opinions::all()->toArray();
        return view('index', compact('opinions'));
    }

    public function sentiment(Request $request){ //request digunakan untuk method post
        $opinions = opinions::getFromSentiment($request->sentiment); //request adalah data yang pilih semuanya dalam bentuk array
        if($request->sentiment==0)
            return view('index', ['opinions'=>$opinions,'selected'=>'kosong']);
        return view('index', ['opinions'=>$opinions,'selected'=>$request->sentiment]);
    }

    public function objek(Request $request){
        $opinions = opinions::getFromObjek($request->objek);
        return view('index', ['opinions'=>$opinions,'selected'=>$request->objek]);
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
        $opinions = opinions::find($id);
        $content = strtolower($opinions['content']);
        // dd($opinions['arr_word']);
        foreach(json_decode($opinions['role_group']) as $key1=>$value1){
            foreach($value1 as $key2=>$value2){
                if($value2 != null){
                    if($value2->value == 0.0){
                        $content= str_replace($value2->word, '<span class="yellow">'.$value2->word.'</span>', $content);
                    }
                    else if($value2->value == 1.0){
                        $content= str_replace($value2->word, '<span class="blue">'.$value2->word.'</span>', $content);
                    }
                    else if($value2->value == -1.0){
                        $content= str_replace($value2->word, '<span class="red">'.$value2->word.'</span>', $content);
                    }
                }
            
            }
        }
        return view('lihat',compact('opinions','id','content'));
    }

    // *
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
     
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
