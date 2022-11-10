<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Customer $customer)
    {
        $customers = $customer->getCustomers();
        return view('customer.index', compact('customers'));
    }
}
