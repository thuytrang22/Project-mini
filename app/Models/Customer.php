<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    public function getCustomers()
    {
        $data = $this->orderBy('created_at', 'desc')->paginate(config('const.PAGINATE'));
        return $data;
    }
}
