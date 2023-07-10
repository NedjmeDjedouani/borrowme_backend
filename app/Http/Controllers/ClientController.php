<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return ClientResource::collection(Client::all()) ;
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
       $client=new Client();
$client->first_name=$request->first_name;
$client->last_name=$request->last_name;
$client->phone_number=$request->phone_number;
$client->balance=$request->balance ?? 0.00;

$client->save();
  return response()->json(["data"=>[ 'id'=>$client->id]]) ;
 // return ClientResource::make($client);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return ClientResource::make(    Client::find($id));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, $id)
    {         $client=Client::find($id);

        $client->update($request->all());
        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        return Client::destroy($id);
    }
}
