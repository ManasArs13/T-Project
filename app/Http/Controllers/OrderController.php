<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{

    public function index()
    {
        $orders = DB::table('orders')->get();
     

        return view('home', ['orders' => $orders]);
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


        return redirect()->route('create')->with('success', 'Заявка успешно отправлена! Ждите подтверждения.');
    }

    public function show($filter)
    {
        
        
        switch ($filter) {
            case 'new':
                $orders = DB::table('orders')
                    ->latest()
                    ->get();
                return view('home', ['orders' => $orders]);
            case 'old':
                $orders = DB::table('orders')
                    ->oldest()
                    ->get();
                return view('home', ['orders' => $orders]);
            case 'active':
                $orders = DB::table('orders')->orderBy('status', 'ASC')
                ->get();
                return view('home', ['orders' => $orders]);
            case 'resolved':
                $orders = DB::table('orders')->orderBy('status', 'DESC')
                ->get();
                return view('home', ['orders' => $orders]);
        }

      
        
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->comment = $request->input('comment');
        $order->status = 'Resolved';
        $order->update();

        return redirect()->route('home')->with('success', 'Заявка обновлена');
    }


}
