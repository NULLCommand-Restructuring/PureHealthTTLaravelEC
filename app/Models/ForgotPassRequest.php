<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgotPassRequest extends Model
{
    use HasFactory;


    protected $table = 'forgot_pass_requests';


    protected $fillable = [
        'requestcode',
        'usercode',
        'created_at'
    ];
}
