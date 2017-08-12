@extends('frontEnd.layouts.master')
@section('title')
Signup Form
@endsection
@section('content')
<div class="women-product" style="padding-top:25px">
    <div class="row well">
        <h5 class="text-center" style="color: #F97E76"> Well Come <strong class="text-success">{{Session::get('customer_name')}}</strong> .Please give us your product payment information to complete your valuable order .</h5>
    </div>
    <div>
        <div class="well">
            <h3 class="text-center text-success">Payment Typr</h3>
            <form action="{{url('payment-save')}}" method="POST">
                {{csrf_field()}}
                <table class="table">
                    <tr>
                        <th> Cash on Delivery</th>
                        <td><input type="radio" name="payment_type" value="cash"></td>
                    </tr>
                    <tr>
                        <th> Paypal</th>
                        <td><input type="radio" name="payment_type" value="paypal"></td>
                    </tr>
                    <tr>
                        <th> Bkash</th>
                        <td><input type="radio" name="payment_type" value="bkash"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="btn" value="Submit Payment Type" class="btn btn-success btn-block"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection