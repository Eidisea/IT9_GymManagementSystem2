<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Member;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::with('member')->latest()->get();
        return view('memberships.index', compact('memberships'));
    }

    public function create()
    {
        $members = Member::all();
        return view('memberships.create', compact('members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'plan_type' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:active,expired,cancelled'
        ]);

        Membership::create($validated);

        return redirect()->route('memberships.index')
            ->with('success', 'Membership created successfully!');
    }

    public function edit(Membership $membership)
    {
        $members = Member::all();
        return view('memberships.edit', compact('membership', 'members'));
    }

    public function update(Request $request, Membership $membership)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'plan_type' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:active,expired,cancelled'
        ]);

        $membership->update($validated);

        return redirect()->route('memberships.index')
            ->with('success', 'Membership updated successfully!');
    }

    public function destroy(Membership $membership)
    {
        $membership->delete();

        return redirect()->route('memberships.index')
            ->with('success', 'Membership deleted successfully!');
    }
}
