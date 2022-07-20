<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorName extends Model
{
    use HasFactory;
    protected $fillable = [
        'visitor_id',
        'v_name',
        'v_email',
        'v_contact',

    ];
}
