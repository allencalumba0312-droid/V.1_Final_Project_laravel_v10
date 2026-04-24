<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = $request->input('q');

        $records = Record::when($query, function ($builder, $query) {
            $builder->where('last_name', 'like', "%{$query}%")
                ->orWhere('first_name', 'like', "%{$query}%")
                ->orWhere('middle_initial', 'like', "%{$query}%")
                ->orWhere('address', 'like', "%{$query}%");

            if (is_numeric($query)) {
                $builder->orWhere('age', $query);
            }
        })->orderBy('last_name')->get();

        return view('records.dashboard', compact('records', 'query'));
    }

    public function index(Request $request)
    {
        $query = $request->input('q');

        $records = Record::when($query, function ($builder, $query) {
            $builder->where('last_name', 'like', "%{$query}%")
                ->orWhere('first_name', 'like', "%{$query}%")
                ->orWhere('middle_initial', 'like', "%{$query}%")
                ->orWhere('address', 'like', "%{$query}%");

            if (is_numeric($query)) {
                $builder->orWhere('age', $query);
            }
        })->orderBy('last_name')->get();

        return view('records.index', compact('records', 'query'));
    }

    public function create()
    {
        return view('records.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:120',
            'first_name' => 'required|string|max:120',
            'middle_initial' => 'nullable|string|max:1',
            'age' => 'nullable|integer|min:0|max:130',
            'address' => 'required|string|max:255',
        ]);

        Record::create($request->all());

        return redirect()->route('records.index')->with('success', 'Record created successfully.');
    }

    public function edit(Record $record)
    {
        return view('records.edit', compact('record'));
    }

    public function update(Request $request, Record $record)
    {
        $request->validate([
            'last_name' => 'required|string|max:120',
            'first_name' => 'required|string|max:120',
            'middle_initial' => 'nullable|string|max:1',
            'age' => 'nullable|integer|min:0|max:130',
            'address' => 'required|string|max:255',
        ]);

        $record->update($request->all());

        return redirect()->route('records.index')->with('success', 'Record updated successfully.');
    }

    public function destroy(Record $record)
    {
        $record->delete();
        return redirect()->route('records.index')->with('success', 'Record moved to trash.');
    }

    public function trashed(Request $request)
    {
        $query = $request->input('q');

        $records = Record::onlyTrashed()->when($query, function ($builder, $query) {
            $builder->where('last_name', 'like', "%{$query}%")
                ->orWhere('first_name', 'like', "%{$query}%")
                ->orWhere('middle_initial', 'like', "%{$query}%")
                ->orWhere('address', 'like', "%{$query}%");

            if (is_numeric($query)) {
                $builder->orWhere('age', $query);
            }
        })->orderBy('last_name')->get();

        return view('records.trashed', compact('records', 'query'));
    }

    public function restore($id)
    {
        $record = Record::withTrashed()->findOrFail($id);
        $record->restore();

        return redirect()->route('records.trashed')->with('success', 'Record restored successfully.');
    }

    public function forceDelete($id)
    {
        $record = Record::withTrashed()->findOrFail($id);
        $record->forceDelete();

        return redirect()->route('records.trashed')->with('success', 'Record permanently deleted.');
    }
}
