<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'address',
        'email',
        'phone',
        'birthday',
        'password'
    ];

    static public function getLabels(){
        return __("teacher");
    }

}
