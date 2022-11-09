<?php

namespace App\Http\Controllers;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(Customer $customer){
        $list_customers= $customer->getListUser();
        return view('customer.index',compact('list_customers'));
    }
    public function create(){
        return view('customer.create');
    }

    public function store(CustomerRequest $request,Customer $customer){
        $request->validated();
        DB::beginTransaction();
        try {
            $query = $customer->insert($request);
            DB::commit();
            return redirect()->route('customer.index')->with('notification', 'User has been created successfully');
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect()->route('customer.index')->with('notification', 'User created failed');
        }
    }
}
