<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;


    protected $table = 'assessments';


    protected $fillable = [
        'productcode',
        'customercode',
        'content',
        'rate',
        'created_at'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customercode', 'usercode')
            ->withDefault([
                'username' => 'Chưa rõ',
                'created_at' => 'Chưa rõ',
                'content' => 'Chưa rõ',
                'rate' => 5,
            ]);
    }
}
