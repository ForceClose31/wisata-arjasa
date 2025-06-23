<?php

namespace App\Http\Controllers;

use App\Models\Transportation;
use Illuminate\Support\Facades\App;

class TransportController extends Controller
{
    public function index()
    {
        $locale = App::getLocale();
        $transportations = Transportation::all();

        return view('user.transport.transport', compact('transportations', 'locale'));
    }
}
