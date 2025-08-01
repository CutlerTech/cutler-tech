<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RequestsController extends Controller
{
    /**
     * Display the requests form
     */
    public function create(): View
    {
        return view('requests');
    }

    /**
     * Store a new project request
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'goal' => 'required|string',
            'email' => 'required|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'employees' => 'nullable|integer|min:1',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'challenge' => 'nullable|string',
            'comments' => 'nullable|string'
        ]);

        // Create the new request record
        Requests::create($validatedData);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your project request has been submitted successfully!');
    }

    /**
     * Display all project requests (admin view)
     */
    public function index(): View
    {
        $requests = Requests::latest()->paginate(15);
        $statusOptions = Requests::getStatusOptions();
        
        return view('requests.index', compact('requests', 'statusOptions'));
    }

    /**
     * Display a specific project request
     */
    public function show(Requests $request): View
    {
        $statusOptions = Requests::getStatusOptions();
        return view('requests.show', compact('request', 'statusOptions'));
    }

    /**
     * Update request status
     */
    public function updateStatus(Request $request, Requests $projectRequest): RedirectResponse
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,in_progress,completed,cancelled'
        ]);

        $projectRequest->update($validatedData);

        return redirect()->back()->with('success', 'Request status updated successfully!');
    }

    /**
     * Delete a project request
     */
    public function destroy(Requests $request): RedirectResponse
    {
        $request->delete();
        
        return redirect()->route('requests.index')->with('success', 'Request deleted successfully!');
    }
}
