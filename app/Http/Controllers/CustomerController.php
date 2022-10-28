<?php

namespace App\Http\Controllers;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Customer $customer){
        $list_customers= $customer->getListUser();
        return view('customer.index',compact('list_customers'));
    }
    public function create(){
        return view('customer.create');
    }
}
