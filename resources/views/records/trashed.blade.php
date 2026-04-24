@extends('layouts.app')

@section('content')

<div class="card">
    <div class="page-head">
        <div>
            <div class="page-title">Deleted Records</div>
          
        </div>
        <a href="{{ route('records.index') }}" class="btn btn-secondary">Active Records</a>
    </div>

    <form method="GET" action="{{ route('records.trashed') }}" class="search-form" style="margin-bottom: 1.5rem;">
        <input type="search" name="q" value="{{ $query ?? '' }}" class="search-input" placeholder="Search deleted records" />
        <button type="submit" class="btn btn-primary">Search</button>
        @if(!empty($query))
            <a href="{{ route('records.trashed') }}" class="btn btn-secondary">Clear</a>
        @endif
    </form>

    <div style="overflow-x: auto;">
        <table>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Initial</th>
                <th>Age</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            @forelse($records as $record)
            <tr>
                <td>{{ $record->last_name }}</td>
                <td>{{ $record->first_name }}</td>
                <td>{{ $record->middle_initial ?: '-' }}</td>
                <td>{{ $record->age ?? '-' }}</td>
                <td>{{ $record->address }}</td>
                <td class="table-actions">
                    <form action="{{ route('records.restore', $record->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-primary">Restore</button>
                    </form>
                    <form action="{{ route('records.forceDelete', $record->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Permanently delete this record?');" class="btn btn-secondary">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="padding: 2rem; text-align: center; color: var(--muted);">No trashed records found.</td>
            </tr>
            @endforelse
        </table>
    </div>
</div>

@endsection
