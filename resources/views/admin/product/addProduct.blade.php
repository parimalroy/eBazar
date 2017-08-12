@extends('layouts.app')
@section('title')
E-Bazar Product Add
@endsection

@section('content')
<br/><br/><br>
<div class="row">
    <h3 class="text-success">Add Product</h3><hr/>
    <form role="form"action="{{route('save-product')}}" method="POST"enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-sm-8">
            <div class="well">
                <div class="form-group">
                    <label for="product_name" class="control-label col-sm-3">Product Name</label>
                    <div class="input-group col-sm-9">
                        <input type="text" class="form-control" id="categorie_name" name="product_name" id="InputName">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk text-danger">{{$errors->has('product_name')? $errors->first('product_name'): ''}}</span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Categorie Name</label>
                    <div class="input-group col-sm-9">
                        <select class="form-control" name="categorie_id">
                            <option>---------------------Select Publication Status-------------------</option>
                            @foreach($categoriesById as $categorieById)
                            <option value="{{$categorieById->id}}">{{$categorieById->categorie_name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Manufacture Name</label>
                    <div class="input-group col-sm-9">
                        <select class="form-control" name="manufacture_id">
                            <option>---------------------Select Publication Status-------------------</option>
                            @foreach($manufacturesById as $manufactureById)
                            <option value="{{$manufactureById->id}}">{{$manufactureById->manufacture_name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="product_price" class="control-label col-sm-3">Product price</label>
                    <div class="input-group col-sm-9">
                        <input type="text" class="form-control" id="categorie_name" name="product_price" id="InputName">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk text-danger">{{$errors->has('product_price')? $errors->first('product_price'): ''}}</span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_quantity" class="control-label col-sm-3">Product Quantity</label>
                    <div class="input-group col-sm-9">
                        <input type="number" class="form-control" id="categorie_name" name="product_quantity" id="InputName">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk text-danger">{{$errors->has('product_quantity')? $errors->first('product_quantity'): ''}}</span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_short_description" class="control-label col-sm-3">Product Short Description</label>
                    <div class="input-group col-sm-9">
                        <textarea type="text" name='product_short_description' id="categoire_description" style="resize: none" class="form-control" rows="4"></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk text-danger">{{$errors->has('product_short_description')? $errors->first('product_short_description'): ''}}</span></span>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label for="product_description" class="control-label col-sm-3">Description</label>
                    <div class="input-group col-sm-9">
                        <textarea type="text" name='product_description' id="categoire_description" style="resize: none" class="form-control" rows="8"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_main_image" class="control-label col-sm-3">Product Main Photo</label>
                    <div class="input-group col-sm-9">
                        <input type="file" accept="image/*"name="product_main_image" multiple>
                        <span class="text-danger">{{$errors->has('product_main_image')? $errors->first('product_main_image'): ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_image1" class="control-label col-sm-3"class="glyphicon glyphicon-asterisk text-danger">Photo Gallery</label>
                    <div class="input-group col-sm-9">
                        <input type="file" accept="image/*"name="product_image1">
                        <span class="text-danger">{{$errors->has('product_image1')? $errors->first('product_image1'): ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_image2" class="control-label col-sm-3"></label>
                    <div class="input-group col-sm-9">
                        <input type="file" accept="image/*"name="product_image2" multiple>
                        <span class="text-danger">{{$errors->has('product_image2')? $errors->first('product_image2'): ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Publication Status</label>
                    <div class="input-group col-sm-9">
                        <select class="form-control" name="publication_status">
                            <option>---------------------Select Publication Status-------------------</option>
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail" class="control-label col-sm-3"></label>
                    <div class="input-group col-sm-9">
                        <input type="submit" name="submit" id="submit" value="Save Product Info" class="btn btn-success btn-block btn-lg">
                    </div>
                </div>
            </div>
    </form>
</div>
<div class="col-sm-3 col-md-push-1">
    <div class="col-sm-12">
        <div>
            <strong><span class="glyphicon glyphicon-ok text-success">{{Session::get('message')}}</span></strong>
        </div>
        <!--            <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                    </div>-->
    </div>
</div>
</div>
@endsection