@extends('admin.master')
@section('content')
<div class="panel panel-default">
   <div class="panel-heading">
       Product List
    </div>
    <!-- /.card-header -->
    <div class="panel-body">
      <form action="" method="get" class="form-horizontal">
         <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search by name or price" name="keyc">
            <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="submit">Search</button>
            </span>
         </div>
      </form>
       <table id="example1" class="table table-bordered table-striped">
          <thead>
             <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Featured</th>
                <th>Edit</th>
                <th>Delete</th>
             </tr>
          </thead>
          <tbody>
              @forelse ($products as $product)
             <tr>
                <td>
                  @php
                  $img = $product->image == NULL ? 'noimg.png' : $product->image;
                  $image_url = asset('images/' . $img)
                  @endphp
                  <img src="{{ $image_url }}" alt="Product Image" width="200" height="200">
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->cname }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                  @if ($product->status == 0)
                     <strong>Hidden</strong>
                  @else
                     <strong>Visible</strong>
                  @endif
                </td>
                <td>
                  @if ($product->featured == 0)
                     <strong>No</strong>
                  @else
                     <strong>Yes</strong>
                  @endif
                </td>
                <td>
                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td>
                    <form action="{{ route('admin.product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
             </tr>
             @empty
             <tr>
                <td colspan="9" align="center">No data available</td>
             </tr>
             @endforelse
          </tbody>
       </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
          <div class="col-sm-5 text-center">
              {{-- You can show summary info here --}}
          </div>
          <div class="col-sm-7 text-right text-center-xs">
              <ul class="pagination pagination-sm m-t-none m-b-none">
                  {{ $products->links() }}
              </ul>
          </div>
      </div>
  </footer>
</div>
@endsection
