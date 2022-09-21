<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( ["success" => true ,
        "data" => Review::all()
       ]
       , 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        return response()->json( ["success" => true ,
        "data" => Review::create($request->all())
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
        "data" => Review::find($id)
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
        $r=Review::find($id);
        $r->update($request->all());
        return response()->json( ["success" => true ,
                                  "data" => $r
                                 ]
                                 , 200 );
    }

    /**
     * Remove the specified resource from storReview
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $r=Review::find($id);
        $r->delete($id);
        return response()->json( ["success" => true ,
                                  "data" => $r
                                 ]
                                 , 200 );
    }
}
