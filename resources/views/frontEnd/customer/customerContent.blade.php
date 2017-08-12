@extends('frontEnd.layouts.master')
@section('title')
Signup Form
@endsection
@section('content')
<div class="women-product" style="padding-top:25px">
    <div class="row well">
        <h5 class="text-center" style="color: #F97E76"> Well Come <strong class="text-success">{{Session::get('customer_name')}}</strong> . Thanks for your valuable order.as soon as we contect with you .</h5>
    </div>
</div>
@endsection