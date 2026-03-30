<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->get();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'age' => 'required|integer|min:1|max:120'
        ]);

        Member::create($validated);

        return redirect()->route('members.index')
            ->with('success', 'Member added successfully!');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'age' => 'required|integer|min:1|max:120'
        ]);

        $member->update($validated);

        return redirect()->route('members.index')
            ->with('success', 'Member updated successfully!');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')
            ->with('success', 'Member deleted successfully!');
    }
}
