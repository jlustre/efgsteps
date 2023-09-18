<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainorController extends Controller
{
    public function TrainorDashboard() {
        return view('trainor.trainor_dashboard');
    } // end method
}