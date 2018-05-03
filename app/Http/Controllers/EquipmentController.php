<?php

namespace App\Http\Controllers;

use App\User;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\StatusUpdated;

class EquipmentController extends Controller
{
    public function index()
    {
        return view('equipment.index');
    }

    public function show($equipment)
    {
        return view('equipment.show', compact('equipment'));
    }

    public function update(Request $request)
    {
        // Find the user in the system
        $user = User::where('firstname', $request['name'])->first();

        // Find the machine
        $machine = Status::where('machine', $request['equipment'])->first();

        // Adjust the machine values in the DB
        $machine->status = 'running';
        $machine->user_id = $user->id;
        $machine->updated_at = Carbon::now();

        $machine->save();

        $newStatus = [
            $request['equipment'] => [
                'status' => 'running',
                'user'   => ucfirst($request['name']),
                'time'   => $machine->updated_at->diffForHumans()
            ]
        ];

        StatusUpdated::dispatch($newStatus);

        return redirect('/equipment/' . $request['equipment'] . '?success=true');
    }
}
