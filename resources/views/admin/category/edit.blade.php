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
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>


    <form method="post" action="{{route('admin.category.update',$category->id)}}" >
        @csrf
    <div class="card-body">

        <label>Thể loại cha</label>
        <select class="form-control" name="parent">
        <option value="0" >----------</option>
    <?php
        $datas = array();
        $data= array();
    ?>
    @foreach($categorys as $cate)
    @if (!empty($category))
        <?php
        $data['id'] = $cate->id;
        $data['name'] = $cate->name;
        $data['parent'] = $cate->parent;
        $datas[]=$data;
        ?>
    @endif
    @endforeach
    <?php dequy($datas,0) ?>
        </select>
        <label for="exampleInputEmail1">Category Name</label>
        <input type="text" name="name" class="form-control" value="{{$category->name}}">
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Edit</button>
        <button type="reset" class="btn btn-info">Delete</button>
    </div>
    </form>
</div>
@endsection