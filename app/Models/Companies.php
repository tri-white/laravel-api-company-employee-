<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $table= "companies";
    protected $hidden = [
        'created_at','updated_at',
    ];
    public function employees():hasMany{
        return $this->hasMany('employees');
    }
}
