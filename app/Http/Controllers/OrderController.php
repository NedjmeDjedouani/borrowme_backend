<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
   
    {   $client_id=$request->query("client_id");
        if ($client_id!=null)
        {

          return OrderResource::collection($this->getOrdersbyclient($client_id)) ;
        }
        return OrderResource::collection(Order::all());
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
      $order=new Order();
      $order->quantity=$request->quantity;
      $order->name=$request->name;
      $order->price=$request->price;
      $order->client_id=$request->client_id;

      $order->save();
      return $order->id;
    }

    /**
     * Display the specified resource.
     */
    public function show($id):OrderResource
    {
       return OrderResource::make(Order::find($id)) ;
    }

    public function getOrdersbyclient(string $client_id)
    {
$orderslist= Client::find($client_id)->orders;
return $orderslist;
    }

    public function deleteOrdersbyclient(Request $request)
    {
        $client_id=      $request->query('client_id');
        $orders= Client::find($client_id)->orders()  ;
       $orders->delete();
     
return true;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, $id)
    {
    $order=Order::find($id);
    $order->update($request->all());
    return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {  
        
      return Order::destroy($id);
    }
}
