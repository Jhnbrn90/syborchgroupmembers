<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('students.index', compact('users'));
    }

    public function getApi(Request $request)
    {
        $users = User::inGroup($request['group'])
                ->hasRole($request['members'])
                ->timePeriod($request['time'])
                ->orderBy('start_date', 'DESC')
                ->get();

        return $users;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|email',
            'group'     => 'required',
            'role'      => 'required',
            'password'  => 'required',
            'start'     => 'required',
            'end'       => 'required'
        ]);

        $start = Carbon::parse($validated['start']);
        $end = Carbon::parse($validated['end']);
	
	// check if user already had an account previously
	if(User::where('email', $validated['email'])->count() > 0) {
		$user = User::where('email', $validated['email'])->first();
		$user->password = Hash::make($validated['password']);
		$user->phone = $request['phone'];
		$user->group = $validated['group'];
		$user->role = $validated['role'];
		$user->start_date = $start;
		$user->end_date = $end;
		$user->save();
	} else {


        $user = User::create([
            'firstname'  => $validated['firstname'],
            'lastname'   => $validated['lastname'],
            'email'      => $validated['email'],
            'password'   => Hash::make($validated['password']),
            'phone'      => $request['phone'],
            'group'      => $validated['group'],
            'role'       => $validated['role'],
            'start_date' => $start,
            'end_date'   => $end
	    ]);
	}

        Auth::login($user, true);

        return redirect('/');
    }
}
