@extends('layouts.app')

@section('content')

<div class="card card-alt">
    <div class="page-head">
        <div>
            <div class="page-title">Dashboard</div>
          
        </div>
            <form method="GET" action="{{ route('dashboard') }}" class="search-form" style="display: flex; gap: 0.5rem;">
        
        <input type="search" name="q" value="{{ $query ?? '' }}" class="search-input" 
        placeholder="Search last name, first name, age, address" />
        
        <button type="submit" class="btn btn-primary">Search</button>

        @if(!empty($query))
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Clear</a>
        @endif

    </form>
    </div>


<div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem;">
    <div class="card" style="flex: 1; max-width: 300px; min-width: 220px; padding: 1.5rem; text-align: center;">
        <h3 style="margin-bottom: 0.5rem;">Total Records</h3>
        <p style="font-size: 2rem; font-weight: 700; color: var(--brand);">
            {{ count($records) }}
        </p>
    </div>
</div>

<div class="card">
    <div style="overflow-x: auto;">
        <table>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Initial</th>
                <th>Age</th>
                <th>Address</th>
            </tr>
            @forelse($records as $record)
            <tr>
                <td>{{ $record->last_name }}</td>
                <td>{{ $record->first_name }}</td>
                <td>{{ $record->middle_initial ?: '-' }}</td>
                <td>{{ $record->age ?? '-' }}</td>
                <td>{{ $record->address }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="padding: 2rem; text-align: center; color: var(--muted);">No records created yet.</td>
            </tr>
            @endforelse
        </table>
    </div>
</div>
</div>
@endsection
