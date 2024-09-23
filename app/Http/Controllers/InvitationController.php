<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invitation;
use App\Models\Position;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all()->where('owner_id', auth()->user()->id)->first();
        $invitations = Invitation::all()->where('company_id', $company->id);
        return view('pages.invitations.index', compact('invitations', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        $positions = Position::all();
        return view('pages.invitations.create', compact('company', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'position_id' => 'nullable|exists:positions,id',
        ]);

        $company = Company::all()->where('owner_id', auth()->user()->id)->first();
        $inviter = auth()->user();
        Invitation::create([
            'company_id' => $company->id,
            'email' => $request->email,
            'invited_by' => $inviter->id,
            'status' => 'pending',
            'position_id' => $request->position_id,
        ]);

        return redirect()->route('invitations.index', $company)->with('success', 'Invitation sent successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitation $invitation)
    {
        $invitation->delete();
        return redirect()->route('invitations.index', $invitation->company)->with('success', 'Invitation deleted successfully.');
    }
}
