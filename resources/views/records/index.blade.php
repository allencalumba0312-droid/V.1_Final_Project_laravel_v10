@extends('layouts.app')

@section('content')

<div class="card">
    <div class="page-head">
        <div>
            <div class="page-title">Records</div>
           
        </div>
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
            <a href="{{ route('records.create') }}" class="btn btn-primary">New Record</a>
            <a href="{{ route('records.trashed') }}" class="btn btn-secondary">View Deleted</a>
        </div>
    </div>

    <form method="GET" action="{{ route('records.index') }}" class="search-form" style="margin-bottom: 1.5rem; text-align: center;">
    
    <input type="search" name="q" value="{{ $query ?? '' }}" class="search-input"
    placeholder="Search last name, first name, age, address" style="margin-bottom: 0.5rem;" />
    
    <div>
        <button type="submit" class="btn btn-primary">Search</button>

        @if(!empty($query))
            <a href="{{ route('records.index') }}" class="btn btn-secondary">Clear</a>
        @endif
    </div>

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
                    <a href="{{ route('records.edit', $record->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('records.destroy', $record->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Move this record to trash?');" class="btn btn-secondary">Trash</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="padding: 2rem; text-align: center; color: var(--muted);">No records found. <a href="{{ route('records.create') }}">Create one now</a></td>
            </tr>
            @endforelse
        </table>
    </div>
</div>

@endsection
