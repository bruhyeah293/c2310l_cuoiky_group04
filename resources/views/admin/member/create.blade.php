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
    <section class="panel">
        <header class="panel-heading">
            Create Member
        </header>
        <div class="panel-body">
            <div class="position-center">
                <form method="post" action="{{route('admin.member.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Please enter email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Please enter password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Please enter 
                        comfirm password">
                    </div>
                    <div class="form-group">
                        <label>Type of Admin</label>
                        <select class="form-control m-bot15" name="level">
                            <option value="2">Member</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection