<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name','last_name','email','phone'];
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
