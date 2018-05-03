<?php

namespace App\Http\Controllers;

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
        $newStatus = [
            $request['equipment'] => [
                'status' => 'running',
                'user'   => $request['name'],
                'time'   => Carbon::now()->diffForHumans()
            ]
        ];

        StatusUpdated::dispatch($newStatus);

        return redirect('/equipment/' . $request['equipment'] . '?success=true');
    }
}
