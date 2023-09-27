<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function TrainerDashboard() {
        return view('trainer.trainer_dashboard');
    } // end method
}
