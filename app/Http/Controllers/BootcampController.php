<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use App\Http\Requests\StoreBootcampRequest;
                

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Metodo json: transmite response en formato json
        //       parametros: datos a transmitir 
                             //codigo http del responsive
        return response()->json( ["success" => true ,
                                  "data" => Bootcamp::all()
                                 ]
                                 , 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest  $request)
    {
        
       
            

        return response()->json( ["success" => true ,
                                  "data" => Bootcamp::create($request->all())
                                 ]
                                 , 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( ["success" => true ,
                                  "data" => Bootcamp::find($id)
                                 ]
                                 , 200 );
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
        $b=Bootcamp::find($id);
        $b->update($request->all());
        return response()->json( ["success" => true ,
                                  "data" => $b
                                 ]
                                 , 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b=Bootcamp::find($id);
        $b->delete($id);
        return response()->json( ["success" => true ,
                                  "data" => $b
                                 ]
                                 , 200 );
    }
}