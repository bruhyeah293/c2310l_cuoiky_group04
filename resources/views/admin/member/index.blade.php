@extends('admin.master')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Members List
    </div>
    <div class="panel-body">
        <form action="" method="get" class="form-horizontal">
            <div class="input-group">
                <input type="text" class="input-sm form-control" placeholder="Search" name="key" value="{{ old('key') }}">
                <span class="input-group-btn">
                    <button class="btn btn-sm btn-default" type="submit">Search</button>
                </span>
            </div>
        </form>
       <table id="example1" class="table table-bordered table-striped">
           <thead>
                <tr>
                    <th>STT</th>
                    <th>Email</th>
                    <th>Type of admin</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $member->email }}</td>
                    <td>@if ($member->id==1) SuperAdmin @elseif($member->level==1) Admin @else Member @endif</td>
                    <td><a href="{{route('admin.member.edit', $member->id)}}">Sửa</a></td>
                    <td><a onclick="return confirmDelete()" href="{{route('admin.member.delete', $member->id)}}">Xóa</a></td>
                </tr>
                @empty
                <tr><td colspan="5" align="center">No Data</td></tr>
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
                        <a href=""><i class="fa fa-chevron-right"></i></a>
                    </li> --}}
                    {{$members->links()}}
                </ul>
            </div>
        </div>
    </footer>
</div>
@endsection