@extends('admin.master')
@section('content')

@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i>Error Notice</h5>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Category</h3>
    </div>

    <form method="post" action="{{ route('admin.category.update', $category->id) }}">
        @csrf
        <div class="card-body">
            <label>Father Category</label>
            <select class="form-control" name="parent">
                <option value="0">----------</option>
                @php
                    $datas = [];
                    $data = [];
                @endphp

                @foreach($categorys as $cate)
                    @if (!empty($category))
                        @php
                            $data['id'] = $cate->id;
                            $data['name'] = $cate->name;
                            $data['parent'] = $cate->parent;
                            $datas[] = $data;
                        @endphp
                    @endif
                @endforeach

                @php dequy($datas, $category->parent) @endphp
            </select>

            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Update</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>

@endsection
