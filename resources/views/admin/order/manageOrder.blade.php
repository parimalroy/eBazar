@extends('layouts.app')
@section('title')
E-Bazar Manage Products
@endsection

@section('content')
<div class="row"></br>
    <div class="col-lg-12 well">
        <strong><span class="glyphicon glyphicon-ok text-success">{{Session::get('message')}}</span></strong>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Order id</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($orders as $order)
                        <tr class="odd gradeX">
                            <td>{{$i}}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->first_name.' '.$order->last_name}}</td>
                            <td>{{$order->order_total}}</td>
                            <td>{{$order->order_status}}</td>
                            <td>{{$order->payment_type}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td class="center">
                                <form action="" method="POST" style="display: inline">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" name="product_id">
                                    <button type="submit" title="Edit" class="btn btn-success btn-sm">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>

                                </form>
                                <form action="{{url('delete/order')}}" method="POST" style="display: inline">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$order->id}}" name="order_id">
                                    <button type="submit" title="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete!');">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>

                                </form>
                            </td>


                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    @endsection