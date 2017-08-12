@extends('layouts.app')
@section('title')
E-Bazar Manage Categories
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
                            <th>Categorie Id</th>
                            <th>Categorie Name</th>
                            <th>Categorie Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getAllCategories as $getAllCategorie)
                        <tr class="odd gradeX">
                            <td>{{$getAllCategorie->id}}</td>
                            <td>{{$getAllCategorie->categorie_name}}</td>
                            <td>{{$getAllCategorie->categoire_description}}</td>
                            <td class="center">{{$getAllCategorie->publication_status==1?'Publish':'Unpublish'}}</td>
                            <td class="center">
                                @if($getAllCategorie->publication_status==1)
                                <form action="{{route('categorie-unpublish')}}" method="POST" style="display: inline">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$getAllCategorie->id}}" name="categore_id">
                                    <button type="submit" title="Unpublish" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </button>
                                </form>
                                @else
                                <form action="{{route('categorie-publish')}}" method="POST" style="display: inline">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$getAllCategorie->id}}" name="categore_id">
                                    <button type="submit" title="Publish" class="btn btn-warning btn-sm">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </button>
                                </form>
                                @endif
                                <form action="{{route('categorie-edit')}}" method="POST" style="display: inline">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$getAllCategorie->id}}" name="categore_id">
                                    <button type="submit" title="Edit" class="btn btn-success btn-sm">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>

                                </form>
                                <form action="{{route('categorie-delete')}}" method="POST" style="display: inline">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$getAllCategorie->id}}" name="categore_id">
                                    <button type="submit" title="Delete" class="btn btn-danger btn-sm">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>

                                </form>
                            </td>
                        </tr>
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