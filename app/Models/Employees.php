<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $table= "employees";
    protected $hidden = [
        'created_at','updated_at',
    ];
    public function company():belongsTo{
        return $this->belongsTo('companies');
    }
}
