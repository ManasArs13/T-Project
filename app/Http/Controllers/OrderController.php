<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{

    public function index()
    {
        $orders = DB::table('orders')->paginate(10);


        return view('home', ['orders' => $orders]);
    }


    public function create()
    {
        return view('createOrder');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email'],
            'message' => ['required', 'max:250'],
        ]);
        

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
                    ->paginate(10);
                return view('home', ['orders' => $orders]);
            case 'old':
                $orders = DB::table('orders')
                    ->oldest()
                    ->paginate(10);
                return view('home', ['orders' => $orders]);
            case 'active':
                $orders = DB::table('orders')
                    ->orderBy('status', 'ASC')
                    ->paginate(10);
                return view('home', ['orders' => $orders]);
            case 'resolved':
                $orders = DB::table('orders')
                    ->orderBy('status', 'DESC')
                    ->paginate(10);
                return view('home', ['orders' => $orders]);
        }
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'comment' => ['required', 'max:250']
        ]);

        $order = Order::findOrFail($id);
        $order->comment = $request->input('comment');
        $order->status = 'Resolved';
        $order->update();

        return redirect()->route('home')->with('success', 'Заявка обновлена');
    }
}
