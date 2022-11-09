<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    public function getCustomer()
    {
        $data = $this->orderBy('created_at', 'desc')->paginate(20);
        return $data;
    }
}
