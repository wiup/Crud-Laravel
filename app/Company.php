<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','email','logo'];
    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
