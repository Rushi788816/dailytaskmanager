<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LeadController extends Controller
{
    /**
     * Store a newly created Lead in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'campaign_name' => 'required|string|max:255',
            'client_email_id' => 'required|email|max:255',
            'keyword' => 'required|string|max:255',
            'lead_generated_date' => 'required|date',
        ]);

        Lead::create([
            'user_id' => auth()->id(),
            'campaign_name' => $request->campaign_name,
            'client_email_id' => $request->client_email_id, // ✅ correct column name
            'keyword' => $request->keyword,
            'lead_generated_date' => $request->lead_generated_date,
        ]);


        return redirect()->back()->with('success', 'Lead added successfully!');
    }





    /**
     * Update the specified Lead.
     */
    public function update(Request $request, Lead $lead)
    {
        $validatedData = $request->validate([
            'campaign_id' => 'sometimes|required|exists:campaigns,id',
            'name'        => 'sometimes|required|string|max:255',
            'email'       => 'sometimes|required|email|max:255',
            'status'      => 'sometimes|required|string|max:100',
        ]);

        $lead->update($validatedData);

        return response()->json([
            'message' => 'Lead updated successfully',
            'data'    => $lead,
        ]);
    }

    /**
     * Remove the specified Lead from storage.
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return response()->json([
            'message' => 'Lead deleted successfully',
        ]);
    }
}
