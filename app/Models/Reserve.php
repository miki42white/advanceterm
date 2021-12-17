<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'time', 'number'];

    public static $rules = array(
        'date' => 'required',
        'time' => 'required',
        'number' => 'required');
        
}
