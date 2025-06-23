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
                    <th>No.</th>
                    <th>Email</th>
                    <th>Admin Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php $i = ($members->currentPage() - 1) * $members->perPage(); @endphp
                @forelse($members as $member)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $member->email }}</td>
                    <td>
                        @if ($member->id == 1)
                            Super Admin
                        @elseif($member->level == 1)
                            Admin
                        @else
                            Member
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.member.edit', $member->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.member.delete', $member->id) }}"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Are you sure you want to delete this member?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" align="center">No data available.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <footer class="panel-footer">
        <div class="row">
            <div class="col-sm-5 text-center">
                {{-- You can put summary text here if needed --}}
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                <ul class="pagination pagination-sm m-t-none m-b-none">
                    {{ $members->links() }}
                </ul>
            </div>
        </div>
    </footer>
</div>
@endsection
