@extends('frontEnd.layouts.master')
@section('title')
Signup Form
@endsection
@section('content')
<div class="women-product" style="padding-top:25px">
    <div>
        <div class="well">
            <h2 class="text-success text-center">New Customer Sign Up Form</h2><hr/>
            <form action="{{url('/customer/save')}}" method="POST" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label col-md-3">First Name</label>

                    <div class="col-md-9">
                        <input type='text' name="first_name" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('category_name')? $errors->first('category_name'): ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Last Name</label>

                    <div class="col-md-9">
                        <input type='text' name="last_name" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('category_name')? $errors->first('category_name'): ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Email</label>

                    <div class="col-md-9">
                        <input type='email' name="email" class="form-control"/>
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
                    <label class="control-label col-md-3">Phone</label>

                    <div class="col-md-9">
                        <input type='number' name="phone" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('category_name')? $errors->first('category_name'): ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Address</label>
                    <div class="col-md-9">
                        <textarea class="form-control"rows="4"name="address"></textarea>
                        <span class="text-danger"> {{$errors->has('category_name')? $errors->first('category_name'): ''}}</span>
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label"></label>
                    <div class=" col-md-9 col-md-offset-3">
                        <input type="submit"name="btn"value="Sign Up" class="btn-block btn-success btn-lg">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection