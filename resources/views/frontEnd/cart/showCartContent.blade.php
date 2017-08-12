@extends('frontEnd.layouts.master')
@section('title')
E-Bazar Shopping Cart
@endsection
@section('content')
<h5 class="text-center text-success">{{Session::get('message')}}</h5>
<div class="women-product" style="padding-top:25px">
    <table class="table table-bordered">
        <thead style="background-color: #F97E76">
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Quantity</th>
                <th>Product Price</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $sum=0 ?>
            @foreach($cartProducts as $cartProduct)
            <tr>
                <th>{{$cartProduct->id}}</th>
                <td>{{$cartProduct->name}}</td>
                <td>
                    <form class="form-inline" action="{{url('update-quantity')}}" method="POST">
                        {{csrf_field()}}
                        <div class="input-group">
                            <input type="number" class="form-control" min="1" value="{{$cartProduct->qty}}" name="product_quantity">
                            <input type="hidden" value="{{$cartProduct->rowId}}" name="rowId">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary " title="Edit">
                                    <span class="glyphicon glyphicon-upload"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </td>
                <td>Tk.{{$cartProduct->price}}</td>
                <td>Tk.{{$cartProduct->subtotal}}</td>
                <td>
                    <a href="{{url('/cart-delete/'.$cartProduct->rowId)}}">
                        <button class="btn btn-danger btn-sm">
                            <input type="button" class="glyphicon glyphicon-trash" title="Delete" onclick="return confirm('Are you want to delete this one !')">
                        </button>
                    </a>
                </td>
            </tr>
            <?php $sum=$sum+$cartProduct->subtotal?>
            @endforeach
        </tbody>
    </table>
    <div class="well">
        <h3 class="text-center text-success">Total Tk. {{$sum}}</h3>
        {{Session::put('order_total',$sum)}}
    </div>
    <div>
        <?php
        $customerById = Session::get('customer_id');
        $shipping_id = Session::get('shipping_id');
        if ($customerById !== null && $shipping_id !== null) {
            ?>
            <a href="{{url('/paymentInformation')}}"><input type="submit" value="CheckOut" class="btn btn-success pull-right"></a>
        <?php } else if (($customerById !== null && $shipping_id == null)) { ?>
            <a href="{{url('shipping-information')}}"><input type="submit" value="CheckOut" class="btn btn-success pull-right"></a>
        <?php } else { ?>
            <a href="{{url('checkout')}}"><input type="submit" value="CheckOut" class="btn btn-success pull-right"></a>
        <?php } ?>
        <a href="{{url('/')}}"><input type="submit" value="Continue Shopping" class="btn btn-success"></a>
    </div>
</div>
@endsection