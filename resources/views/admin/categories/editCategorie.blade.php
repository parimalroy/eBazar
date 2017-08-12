@extends('layouts.app')
@section('title')
Admin Update Categories Form
@endsection

@section('content')
<br/><br/><br>
<div class="row">
    <h3 class="text-success">Update Categorie</h3><hr/>
    <form role="form"action="{{route('categorie-update')}}" name="updateForm" method="POST">
        <input type="hidden" name="categore_id" value="{{$categoriesById->id}}">
        {{csrf_field()}}
        <div class="col-sm-8">
            <div class="well">
                <div class="form-group">
                    <label for="categorie_name" class="control-label col-sm-3">Categorie Name</label>
                    <div class="input-group col-sm-9">
                        <input type="text" class="form-control" id="categorie_name" name="categorie_name" value="{{$categoriesById->categorie_name}}" id="InputName" readonly required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk text-danger">{{$errors->has('categorie_name')? $errors->first('categorie_name'): ''}}</span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="categoire_description" class="control-label col-sm-3">Description</label>
                    <div class="input-group col-sm-9">
                        <textarea type="text" name='categoire_description' id="categoire_description" style="resize: none" class="form-control" rows="8">{{$categoriesById->categoire_description}}</textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk text-danger">{{$errors->has('categoire_description')? $errors->first('categoire_description'): ''}}</span></span>
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
                        <input type="submit" name="submit" id="submit" value="Update Categorie Info" class="btn btn-success btn-block btn-lg">
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
<script>
document.forms['updateForm'].elements['publication_status'].value="{{$categoriesById->publication_status}}";
</script>
@endsection