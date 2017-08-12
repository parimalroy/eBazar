@extends('frontEnd.layouts.master')
@section('title')
E-Bazar Shopping Cart
@endsection
@section('content')
<h5 class="text-center text-success">{{Session::get('message')}}</h5>
<div class="women-product" style="padding-top:25px">
    <div class="row well">
        <h5 class="text-center" style="color: #F97E76"> Checkout Sucessfully.If you already Registered than sign in or please create an account.</h5>
    </div>
    <div class="well">
        </br>
        <hr/>
        <h3 class="text-success">Log In Form</h3>
        <hr/>
        <form action="{{url('customer-login')}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label col-md-3">Email</label>

                <div class="col-md-9">
                    <input type='text' name="email" class="form-control"/>
                    <span class="text-danger"> {{$errors->has('category_name')? $errors->first('category_name'): ''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Password</label>

                <div class="col-md-9">
                    <input type='password' name="password" class="form-control"/>
                    <span class="text-danger"> {{$errors->has('category_name')? $errors->first('category_name'): ''}}</span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3"></label>
                <div class="col-sm-9">
                    <input type="submit"name="btn"value="Sign in" class="btn-success btn">
                    <a href="{{url('/customer-signup')}}" class="text-primary">Create an account</a>
                </div>
                

            </div>
            
        </form></br><br/>
    </div>
</div>


@endsection