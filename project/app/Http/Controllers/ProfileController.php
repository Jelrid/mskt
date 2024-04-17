<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\EmployerPost;
use App\Models\Method;
use App\Models\Methodology;
use App\Models\ResearchSchedule;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            
            'status' => session('status'),
            'methods' => Method::getActiveMethods()->get(),
            'methodology' => Methodology::getActiveMethodologies()->with('employees')->get(),
            'workTime' => ResearchSchedule::getActiveSchedule()->get(),
            'seansTime' => EmployerPost::getActiveTime()->get(),
       
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        

        $request->user()->fill($request->validated());

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

 

}
