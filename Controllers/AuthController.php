<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    /*
    |--------------------------------------------------------------------------
    | register for company
    |--------------------------------------------------------------------------
    */
    //show register company form
    public function registercompany(){
        // Get all careers for the select box in the form
        $careers = Career::all();
        // Return the view with the careers
        return view('auth.registercompany', ['careers' => $careers]);
    }

    //submit register company form
    public function registerCompanySubmit(Request $request) {
        // Custom error messages
        $messages = [
            'name.required' => 'Company name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'You must enter a valid email address.',
            'email.unique' => 'This email is already in use.',
            'password.required' => 'Password is required.',
            'career_id.required' => 'Career association is required.',
            'career_id.exists' => 'The selected career does not exist.'
        ];
    
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:companies,email',
            'password' => 'required|string|min:6',
            'address' => 'nullable|string|max:255',
            'career_id' => 'required|integer|exists:careers,id'
        ], $messages);
    
        // Encrypt password
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        // Create a new company in the database
        try {
            Company::create($validatedData);
            // Redirect with a success message
            return redirect()->route('auth.login')->with('success', 'Company created successfully.');
        } catch (\Exception $e) {
            // In case of other errors
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create company: ' . $e->getMessage()]);
        }
    }
    

    
}
