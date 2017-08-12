@extends('frontEnd.layouts.master')
@section('title')
Signup Form
@endsection
@section('content')
<div class="women-product" style="padding-top:25px">
    <div class="row well">
        <h5 class="text-center" style="color: #F97E76"> Well Come <strong class="text-success">{{Session::get('customer_name')}}</strong> .Please give us your shipping information.If shipping information is same than please click save button.</h5>
    </div>
    <div>
        <div class="well">
            <h2 class="text-center" style="color: #F97E76">Customer Shipping Information</h2><hr/>
            <form action="{{url('shipping-save')}}" method="POST" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label col-md-3">Full Name</label>

                    <div class="col-md-9">
                        <input type='text' name="full_name" value="{{$customersById->first_name.' '.$customersById->last_name}}"class="form-control"/>
                        <span class="text-danger"> {{$errors->has('category_name')? $errors->first('category_name'): ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Email</label>

                    <div class="col-md-9">
                        <input type='email'value="{{$customersById->email}}" name="email" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('category_name')? $errors->first('category_name'): ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Phone</label>

                    <div class="col-md-9">
                        <input type='number' value="{{$customersById->phone}}" name="phone" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('category_name')? $errors->first('category_name'): ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Address</label>
                    <div class="col-md-9">
                        <textarea class="form-control"rows="4"name="address">{{$customersById->address}}</textarea>
                        <span class="text-danger"> {{$errors->has('category_name')? $errors->first('category_name'): ''}}</span>
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label"></label>
                    <div class=" col-md-9 col-md-offset-3">
                        <input type="submit"name="btn"value="Save Shipping Info" class="btn-block btn-success btn-lg">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection