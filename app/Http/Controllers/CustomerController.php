<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Customer $customer, Request $request)
    {
        $customers = $customer->getCustomers($request);
        return view('customer.index', compact('customers'));
    }
}
