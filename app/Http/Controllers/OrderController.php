<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
 
    public function index()
    {
        return view('createOrder');
    }

    
    public function create()
    {
        return view('createOrder');
    }

    
    public function store(Request $request)
    {
        $order = new Order();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->message = $request->input('message');
        $order->save();
       
        	
return redirect()->route('home')->with('success', 'Заявка успешно отправлена! Ждите подтверждения.');

    }
   
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
