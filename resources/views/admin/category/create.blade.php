@extends('admin.master')
@section('content')
@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i>Error notice</h5>
    <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Category</h3>
    </div>


    <form method="post" action="{{route('admin.category.store')}}" >
        @csrf
    <div class="card-body">

        <label>Father Category</label>
        <select class="form-control" name="parent">
        <option value="0" >----------</option>
        <?php

$datas = array();
$data= array();

    ?>
    @foreach($categorys as $category)
    @if (!empty($category))
        <?php
        $data['id'] = $category->id;
        $data['name'] = $category->name;
        $data['parent'] = $category->parent;
        $datas[]=$data;
        ?>
    @endif
    @endforeach
    <?php dequy($datas,0) ?>
        </select>
        <label for="exampleInputEmail1">Add Category</label>
        <input type="text" name="name" class="form-control">

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Add</button>
        <button type="reset" class="btn btn-info">Delete</button>
    </div>
    </form>
</div>
@endsection
