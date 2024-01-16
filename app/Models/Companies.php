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
    protected $fillable = [
        'name','email','website','image'
    ];
    public function employees():hasMany{
        return $this->hasMany('employees');
    }
    public function getLogo() : string{
        return $this->logo ? str_replace('public','storage',$this->logo): 'storage/logos/default.png';
    }
}
