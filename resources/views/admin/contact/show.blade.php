@extends('admin.master')

@section('content')
<section class="panel">
    <header class="panel-heading">
        Message Details
    </header>
    <div class="panel-body">
        <div class="form-group">
            <label><strong>Sender's Name:</strong></label>
            <p>{{ $contact->name }}</p>
        </div>

        <div class="form-group">
            <label><strong>Email:</strong></label>
            <p>{{ $contact->email }}</p>
        </div>

        <div class="form-group">
            <label><strong>Sent At:</strong></label>
            <p>{{ \Carbon\Carbon::parse($contact->created_at)->format('H:i d/m/Y') }}</p>
        </div>

        <div class="form-group">
            <label><strong>Message:</strong></label>
            <div class="well well-sm">
                {!! nl2br(e($contact->message)) !!}
            </div>
        </div>

        <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">← Back to List</a>
    </div>
</section>
@endsection
