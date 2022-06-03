<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customer;
    public function __construct(CustomerService $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $kendaraan = $this->customer->getKendaraan();

        return view('customer.index', compact('kendaraan'));
    }
}
