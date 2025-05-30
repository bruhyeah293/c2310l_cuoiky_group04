@extends('admin.master')
@section('content')
<div class="card"></div>
<div class="card">
   <div class="card-header">
       <h3 class="card-title">Category List</h3>
       <div class="card-tools">
           <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
               <i class="fas fa-minus"></i>
           </button>
           <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
               <i class="fas fa-times"></i>
           </button>
       </div>
   </div>
   <table class="table">
  <thead>
     <tr>
        <th>Category Name</th>
        <th style="width: 40px">Delete</th>
        <th style="width: 40px">Edit</th>
     </tr>
  </thead>
  <tbody>
     <tr>
      <?php
        $datas = array();
        $data= array();
      ?>
          @foreach($categorys as $category)
              <?php
              $data['id'] = $category->id;
              $data['name'] = $category->name;
              $data['parent'] = $category->parent;
              $datas[]=$data;
              ?>
          @endforeach
        <?php 
           
           dequytable($datas);
        ?>
     </tr>
  </tbody>
</table>
</div>
@endsection