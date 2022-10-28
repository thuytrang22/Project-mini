<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $fillable = [
        'name',
        'email',
        'phone_number'
    ];

    public function getListUser(){
        $data = $this->orderBy('created_at','desc')->paginate(20);
        return $data;
    }

    public function addUser($request){
        $this->create($request->all());
    }

    public function deleteUser($id)
    {
        $this->find($id)->delete();
    }
}
