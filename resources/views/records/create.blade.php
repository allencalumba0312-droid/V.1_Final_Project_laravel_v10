@extends('layouts.app')

@section('content')

<div class="card">
    <div class="page-head">
        <div>
            <h1>New Record</h1>
            <p class="page-subtitle">Add a clean record with the new X-style data structure.</p>
        </div>
        <a href="{{ route('records.index') }}" class="btn btn-secondary">Back to Records</a>
    </div>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('records.store') }}">
        @csrf

        <div class="form-grid">
            <div class="form-field">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
            </div>
            <div class="form-field">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
            </div>
            <div class="form-field">
                <label for="middle_initial">Middle Initial</label>
                <input type="text" name="middle_initial" id="middle_initial" placeholder="M" maxlength="1">
            </div>
            <div class="form-field">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" placeholder="Age" min="0" max="130">
            </div>
        </div>

        <div class="form-field">
            <label for="address">Address</label>
            <textarea name="address" id="address" placeholder="Street address, city, state" required></textarea>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; margin-top: 1.5rem;">
            <button type="submit" class="btn btn-primary">Save Record</button>
            <a href="{{ route('records.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection
