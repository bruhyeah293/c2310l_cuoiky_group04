@extends('admin.master')
@section('content')
@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i>Thông báo lỗi</h5>
    <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit product</h3>
    </div>

    <form method="post" action="{{route('admin.product.update',$product->id)}}" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
    <label>Father category</label>
        <select class="form-control" name="category_id">
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
                <?php dequy($datas,$product->category_id) ?>
        </select>
        <label for="exampleInputEmail1">Product Name</label>
        <input type="text" name="name" class="form-control" placeholder="Vui lòng nhập tên sản phẩm" value="{{$product->name}}">
        <label for="exampleInputEmail1">Product Price</label>
        <input type="text" name="price" class="form-control"  placeholder="Vui lòng nhập giá sản phẩm" value="{{$product->price}}">
        <label for="exampleInputEmail1">Product Quantity</label>
        <input type="text" name="quantity" class="form-control"  placeholder="Vui lòng nhập số lượng sản phẩm" value="{{$product->quantity}}">
        <label for="exampleInputEmail1">Synopsis</label>
        <textarea name="intro" class="form-control">{{$product->intro}}</textarea>
        <label for="exampleInputEmail1">Content</label>
        <textarea name="content" class="form-control">{{$product->content}}</textarea>
        <div class="form-group">
            <div>
                <label>Old Product Image</label>
                <img src="{{asset('images/'.$product->image)}}" alt="" width="200">
            </div>
            <label>Product Image</label>
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="0"  <?php if ($product->status == 0) echo 'selected' ?>>Hidden</option>
                    <option value="1"  <?php if ($product->status == 1) echo 'selected' ?>>Show</option>
                    </select>
            </div>
            <div class="form-group">
                <label>Outstanding</label>
                <select class="form-control" name="featured">
                    <option value="0" <?php if ($product->featured == 0) echo 'selected' ?> >No</option>
                    <option value="1" <?php if ($product->featured == 1) echo 'selected' ?> >Yes</option>
                    </select>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Edit</button>
        <button type="reset" class="btn btn-info">Delete</button>
    </div>
    </form>
</div>
@endsection
