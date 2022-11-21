<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    public function getCustomers($request)
    {
        $customers = $this->query();
        if ($request->keyword) {
            $customers->where('name', 'like', '%' . $request->keyword . '%')->orWhere('email', 'like', '%' . $request->keyword . '%');
        }
        return $customers->orderBy('created_at', 'desc')->paginate(config('const.PAGINATE'));
    }
}
