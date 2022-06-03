<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontakKamiController extends Controller
{
    public function index()
    {   
        $url = 'https://www.google.com/maps/embed/v1/place?key='. config('services.map.key') .'&q=yogyakarta';

        return view('customer.kontak-kami.index', compact('url'));
    }
}
