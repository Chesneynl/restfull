<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Dealer;
use App\Http\Resources\Dealer as DealerResource;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (isset($_GET['limit'])) {
            $dealers = Dealer::paginate($_GET['limit']);
        }
        else {
            $dealers = Dealer::paginate();
        }
         

        return DealerResource::collection($dealers);
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
        $contentType = $request->headers->get('Content-Type');

        if ($contentType == "application/json" || 
            $contentType == "application/x-www-form-urlencoded"
            && $request->input('title') && $request->input('body')
            && $request->input('lat') && $request->input('lng')) {
            $dealer = $request->isMethod('put') ? Dealer::findOrFail
            ($request->dealer_id) : new Dealer;
    
            $dealer->id = $request->input('dealer_id');
            $dealer->title = $request->input('title');
            $dealer->body = $request->input('body');
            $dealer->lat = $request->input('lat');
            $dealer->lng = $request->input('lng');
    
            if ($dealer->save()) {
                return new DealerResource($dealer);
            }
        }
        else {
            abort(415);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dealer = Dealer::findOrFail($id);

        return new DealerResource($dealer);
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
        //
    }

    public function options(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dealer = Dealer::findOrFail($id);

        if ($dealer->delete() && $contentType == "application/json" || $contentType == "application/x-www-form-urlencoded") {
            return new DealerResource($dealer);
        }
        else {
            return abort(405);
        }
    }
}
