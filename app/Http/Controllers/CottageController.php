<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cottage;

class CottageController extends Controller
{
    public function index()
    {
        $cottages = Cottage::where('is_available', true)->get();
        return view('user.cottage.cottage', compact('cottages'));
    }
}
