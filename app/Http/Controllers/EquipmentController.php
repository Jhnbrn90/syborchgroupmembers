<?php

namespace App\Http\Controllers;

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
}
