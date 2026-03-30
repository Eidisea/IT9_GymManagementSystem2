<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Membership;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMembers = Member::count();
        $activeMemberships = Membership::where('status', 'active')->count();
        $expiredMemberships = Membership::where('status', 'expired')->count();
        $totalRevenue = Membership::sum('amount');

        return view('dashboard', compact(
            'totalMembers',
            'activeMemberships',
            'expiredMemberships',
            'totalRevenue'
        ));
    }
}
