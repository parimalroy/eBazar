<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Shipping;
use App\Order;
use App\Order_detail;
use App\Payment;
use Session;
use Cart;

class CheckoutController extends Controller {

    public function index() {
        return view('frontEnd.checkout.checkoutContent');
    }

    public function customerSignup() {
        return view('frontEnd.checkout.signupContent');
    }

    public function saveCustomer(Request $reqiest) {
        $customers = new Customer();
        $customers->first_name = $reqiest->first_name;
        $customers->last_name = $reqiest->last_name;
        $customers->email = $reqiest->email;
        $customers->password = bcrypt($reqiest->password);
        $customers->phone = $reqiest->phone;
        $customers->address = $reqiest->address;
        $customers->save();
        Session::put('customer_id', $customers->id);
        Session::put('customer_name', $reqiest->first_name . ' ' . $reqiest->last_name);
        return redirect('shipping-information');
    }

    public function shippingInfo() {
        $customerId = Session::get('customer_id');
        $customersById = Customer::find($customerId);
        return view('frontEnd.checkout.shippingInformation', ['customersById' => $customersById]);
    }

    public function logoutCustomer() {
        Session::forget('customer_id');
        Session::forget('customer_name');
        return redirect('/');
    }

    public function saveShipping(Request $request) {
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->save();
        Session::put('shipping_id', $shipping->id);
        return redirect('paymentInformation');
    }

    public function paymentInformation() {
        return view('frontEnd.checkout.paymentContent');
    }

    public function savePayment(Request $request) {
        $paymentType = $request->payment_type;

        if ($paymentType == 'cash') {
            $order = new Order();
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->order_total = Session::get('order_total');
            $order->save();
            Session::put('order_id', $order->id);


            $payments = new Payment();
            $payments->order_id = Session::get('order_id');
            $payments->payment_type = $paymentType;
            $payments->save();

            $orderDetails = new Order_detail();
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetails->order_id = Session::get('order_id');
                $orderDetails->product_id = $cartProduct->id;
                $orderDetails->product_name = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->subtotal;
                $orderDetails->product_quantity = $cartProduct->qty;
                $orderDetails->save();
            }
            return redirect('customer-home');
        } 
        else if ($paymentType == 'paypal') {
            return 'Paypal is now under construction.please use case on method';
        } 
        else if ($paymentType == 'bkash') {
            return 'Bkash is now under construction.please use case on method';
        }
    }
    
    public function customerHome(){
        return view('frontEnd.customer.customerContent');
    }

    public function customerLogin(Request $request) {
        $emailAddress = $request->email;
        $customerByEmail = Customer::where('email', $emailAddress)->first();
        $exitPassword = $customerByEmail->password;

        if (password_verify($request->password, $exitPassword)) {
            Session::put('customer_id', $customerByEmail->id);
            Session::put('customer_name', $customerByEmail->first_name . ' ' . $customerByEmail->last_name);
            return redirect('shipping-information');
        } else {
            return redirect('checkout')->with('message', 'email or password are not valid');
        }
    }

}
