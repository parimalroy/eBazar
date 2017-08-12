<?php

namespace App\Http\Controllers;
use App\Order_detail;
use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use DB;

class OrderController extends Controller
{
    public function index(){
        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('payments', 'orders.id', '=', 'payments.order_id')
            ->select('orders.*', 'customers.first_name','customers.last_name','payments.*')
            ->get();
        return view('admin.order.manageOrder',['orders'=>$orders]);
    }
    
    public function deleteOrder(Request $request){
        $orderById= Order::find($request->order_id);
        $orderById->delete();
        return redirect('manage/order')->with('message','Order Delete sucessfully');
    }
}
