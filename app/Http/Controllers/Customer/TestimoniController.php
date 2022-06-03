<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\TestimoniRequest;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {   $testimoni = Testimoni::latest()->paginate(5);

        return view('customer.testimoni.index', compact('testimoni'));
    }

    public function store(TestimoniRequest $request)
    {
        Testimoni::create([
            'user_id' => auth()->user()->id,
            'testimoni' => $request->testimoni
        ]);

        return back();
    }
}
