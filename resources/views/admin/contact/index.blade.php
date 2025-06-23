@extends('admin.master')

@section('content')
<section class="panel">
    <header class="panel-heading">
        Contact List
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Sent Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $index => $contact)
                    <tr>
                        <td>{{ $contacts->firstItem() + $index }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('H:i d/m/Y') }}</td>
                        <td>
                            @if($contact->created_at == $contact->updated_at)
                                <span class="badge bg-warning">Unread</span>
                            @else
                                <span class="badge bg-success">Read</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.contact.read', ['id' => $contact->id]) }}" class="btn btn-primary btn-sm">
                                View Details
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No contact messages found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="text-center">
            {{ $contacts->links() }}
        </div>
    </div>
</section>
@endsection
