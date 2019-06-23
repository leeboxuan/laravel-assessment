<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(Employees::class);
    }

    public function addEmployee($employee)
    {

        $this->employees()->create($employee);
    }


  
}
