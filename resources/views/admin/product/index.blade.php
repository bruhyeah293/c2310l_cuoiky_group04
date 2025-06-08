@extends('admin.master')
@section('content')
<div class="panel panel-default">
   <div class="panel-heading">
       Products List
    </div>
    <!-- /.card-header -->
    <div class="panel-body">
      <form action="" method="get" class="form-horizontal">
         <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search" name="keyc">
            <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit">Search</button>
            </span>
         </div>
      </form>
       <table id="example1" class="table table-bordered table-striped">
          <thead>
             <tr>
                <th>Image</th>
                <th>Name Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th> 
                <th>Outstanding</th>
                <th>Edit</th>
                <th>Delete</th>
             </tr>
          </thead>
          <tbody>
              @forelse ($products as $product)
             <tr>
                <td>
                  @php 
                  $img= $product->image == NULL ? 'noimg.png' : $product->image;          
                  $image_url= asset('images/'.$img) 
                  @endphp
                  <img src="{{$image_url}}" alt="" width="200" height="200">
                </td>
                <td>{{ $product->name}}</td>
                <td>{{ $product->cname}}</td>
                <td>{{ $product->price}}</td>
                <td>{{ $product->quantity}}</td>
                <td>
                  @if ($product->status ==0)
                     <strong>Hidden</strong> 
                  @else
                     <strong>Show</strong> 
                  @endif   
                  </td>
                <td>
                  @if ( $product->featured ==0)
                     <strong>No</strong> 
                  @else
                     <strong>Yes</strong> 
                  @endif
                </td>
                <td><a href="{{route('admin.product.edit', $product->id)}}">Edit</a></td>
                <td><a href="{{route('admin.product.delete', $product->id)}}" onclick="return confirmDelete()">Delete</a></td>
             </tr>
             @empty
            <tr><td colspan="8" align="center">No Data</td></tr>
             @endforelse
          </tbody>
       </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
          <div class="col-sm-5 text-center">
              {{-- <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> --}}
          </div> 
          <div class="col-sm-7 text-right text-center-xs">
              <ul class="pagination pagination-sm m-t-none m-b-none">
                  {{-- <li>
                      <a href=""><i class="fa fa-chevron-left"></i></a>
                  </li>
                  <li><a href="">1</a></li>
                  <li><a href="">2</a></li>
                  <li><a href="">3</a></li>
                  <li><a href="">4</a></li>
                  <li>
                      <a href=""><i class="fa fa-chevron-right"></i></a> --}}
        
                  {{$products->links()}}
              </ul>
          </div>
      </div>
  </footer>
 </div>
 @endsection