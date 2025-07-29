<?php

namespace App\Http\Controllers\Dashboard\Equipments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardEquipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.home.index');
    }
}
