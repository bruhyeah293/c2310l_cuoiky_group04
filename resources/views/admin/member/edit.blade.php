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
        <h3 class="card-title">Add member</h3>
    </div>
    <form method="post" action="{{route('admin.member.update', $member->id)}}">
        @csrf
    <div class="card-body">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Please enter your email" value="{{ $member->email }}" disabled>
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Please enter your pasword">
        <label for="password">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Please enter confirm pasword">
        <label>Type of Admin</label>
        <select name="level" class="form-control">
            <option value="2" @if ($member->level==2) selected @endif>Member</option>
            <option value="1"@if ($member->level==1) selected @endif>Admin</option>
        </select>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Edit</button>
        <button type="reset" class="btn btn-info">Delete</button>
    </div>
    </form>
</div>
@endsection
