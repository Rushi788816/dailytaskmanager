<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Lead;

class DashboardController extends Controller
{
    /**
     * Show the dashboard page with statistics and campaign data.
     */
    public function index()
    {
        $totalLeads = Lead::count();

        $totalMailShoot = Campaign::sum('total_contacts');
        $totalKeywordsDone = Campaign::distinct('keyword')->count('keyword');

        $campaigns = Campaign::latest()->get();

        return view('dashboard', compact(
            'totalLeads',
            'totalMailShoot',
            'totalKeywordsDone',
            'campaigns'
        ));
    }
}
