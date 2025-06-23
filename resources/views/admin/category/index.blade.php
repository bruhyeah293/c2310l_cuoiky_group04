@extends('admin.master')
@section('content')
<div class="card"></div>
<div class="card">
   <div class="card-header">
       <h3 class="card-title">Category List</h3>
   </div>
   <table class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>Category Name</th>
            <th style="width: 80px">Delete</th>
            <th style="width: 80px">Edit</th>
         </tr>
      </thead>
      <tbody>
         <?php
            $datas = [];
            foreach ($categorys as $category) {
                $datas[] = [
                    'id' => $category->id,
                    'name' => $category->name,
                    'parent' => $category->parent,
                ];
            }
            dequytable($datas);
         ?>
      </tbody>
   </table>
</div>
@endsection
