<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transportation;
use Illuminate\Contracts\View\View;

class TransportController extends Controller
{
    public function index(): View
    {
        return view('user.transport.transport');
    }
}
