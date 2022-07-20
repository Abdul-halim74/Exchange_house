<?php

namespace App\Models;

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'v_name',
        'v_email',
        'v_contact',
        'v_token',
        'visiting_reason',
        'v_start_time',
        'v_end_time',
        'bar_code_image',
        'v_image',
        'request_status',
        'entry_by',
        'entry_date',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    // public function visitorName(){
    //     return $this->belongsTo(VisitorName::class,'id');
    // }
    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

}
