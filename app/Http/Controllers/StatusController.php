<?php

namespace App\Http\Controllers;

use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\StatusUpdated;

class StatusController extends Controller
{
    public function update(Request $request)
    {
        $machine = Status::where('machine', $request['machine'])->first();

        $machine->user_id = auth()->id();
        $machine->status = $request['status'];
        $machine->save();

        $newStatus = [
            $machine->machine => [
                'status' => $machine->status,
                'user'   => $machine->user->firstname,
                'time'   => Carbon::parse($machine->updated_at)->diffForHumans()
            ]
        ];

        StatusUpdated::dispatch($newStatus);

        return [
            'status' => $machine->status,
            'user'   => $machine->user->firstname,
            'time'   => Carbon::parse($machine->updated_at)->diffForHumans(),
        ];
    }
}
