<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class CampaignController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        return $user->campaigns()->with('leads')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'keyword' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'total_contacts' => 'required|integer',
            'shoot_email_id' => 'required|email|max:255',
            'schedule_date' => 'required|date',
        ]);

        $validated['user_id'] = auth()->id(); // Link to logged-in user

        Campaign::create($validated);

        return redirect()->back()->with('success', 'Campaign added successfully!');
    }

    public function edit(Campaign $campaign)
    {
        return view('edit', compact('campaign'));

    }

    public function show(Campaign $campaign)
    {
        $this->authorize('view', $campaign);
        return $campaign->load('leads');
    }

    public function update(Request $request, Campaign $campaign)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'keyword' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'total_contacts' => 'required|integer',
            'shoot_email_id' => 'required|email|max:255',
            'schedule_date' => 'required|date',
        ]);

        $campaign->update($validated);
        return redirect()->route('campaigns.index')->with('success', 'Campaign updated successfully!');
    }


    public function destroy(Campaign $campaign)
    {
        $this->authorize('delete', $campaign);
        $campaign->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
