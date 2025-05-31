@extends('admin.master')
@section('sidebar')
    @include('admin.blocks.sidebar')
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5>Error notice</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Product</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <form method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
            <label>Father Category</label>
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
                    <?php dequy($datas,0) ?>
            </select>
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Vui lòng nhập tên sản phẩm" value="{{old('name')}}">
            <label for="exampleInputEmail1">Product Price</label>
            <input type="text" name="price" class="form-control"  placeholder="Vui lòng nhập giá sản phẩm" value="{{old('price')}}">
            <label for="exampleInputEmail1">Synopsis</label>
            <textarea name="intro" class="form-control">{{old('intro')}}</textarea>
            {{-- <script>CKEDITOR.replace('intro')</script> --}}
            <label for="exampleInputEmail1">Content</label>
            <textarea name="content" class="form-control">{{old('content')}}</textarea>
            {{-- <script> CKEDITOR.replace('content')</script> --}}
            <div class="form-group">
                <label>Image Product</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="0" >Hidden</option>
                        <option value="1" >Show</option>
                        </select>
                </div>
                <div class="form-group">
                    <label>Outstanding</label>
                    <select class="form-control" name="featured">
                        <option value="0" >No</option>
                        <option value="1" >Yes</option>
                        </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Add</button>
            <button type="reset" class="btn btn-info">Delete</button>
        </div>
        </form>
    </div>
@endsection
