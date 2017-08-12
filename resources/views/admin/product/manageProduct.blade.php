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
                            <th>Product Name</th>
                            <th>Categorie Name</th>
                            <th>Manufacture Name</th>
                            <th>Price</th>
                            <th>Quentity</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach($products as $product)
                        <tr class="odd gradeX">
                            <td>{{$i}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->categorie_name}}</td>
                            <td>{{$product->manufacture_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_quantity}}</td>
                            <td class="center">{{$product->publication_status==1?'Publish' : 'Unpublish'}}</td>
                            <td class="center">
                               @if($product->publication_status==1)
                                <form action="{{route('product-unpublish')}}" method="POST" style="display: inline">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <button type="submit" title="Unpublish" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </button>
                                </form>
                               @else
                                <form action="{{route('product-publish')}}" method="POST" style="display: inline">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <button type="submit" title="Publish" class="btn btn-warning btn-sm">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </button>
                                </form>
                               @endif
                                <form action="{{route('Manufacture-edit')}}" method="POST" style="display: inline">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" name="product_id">
                                    <button type="submit" title="Edit" class="btn btn-success btn-sm">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>

                                </form>
                                <form action="{{route('product-delete')}}" method="POST" style="display: inline">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
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