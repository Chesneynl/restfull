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
        header("Content-Type: application/json");
        if (isset($_GET['limit'])) {
            $dealers = Dealer::paginate($_GET['limit']);
        }
        else {
            $dealers = Dealer::paginate();
        }

        
        return $dealers->toJson();

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
        if ($request->header('Content-Type') == 'application/json' || 
            $request->header('Content-Type') == 'application/x-www-form-urlencoded'
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
                header("Accept: application/json");
                header("Content-Type: application/json");
                return new DealerResource($dealer);
            }
        }
        else {
            http_response_code(415);    
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
            header("Accept: application/json");
            header("Content-Type: application/json");
            return new DealerResource($dealer);
        }
        else {
            return abort(405);
        }
    }
}
