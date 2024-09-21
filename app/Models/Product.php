<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $table = 'products';


    protected $fillable = [
        'productcode',
        'productname',
        'shortdescription',
        'description',
        'price',
        'discount',
        'picturelink',
        'unitcode',
        'typecode',
        'active',
        'created_at'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'typecode', 'typecode')->withDefault([
            'typename' => 'Chưa rõ'
        ]);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unitcode', 'unitcode')
            ->withDefault([
                'unitname' => 'Chưa rõ'
            ]);
    }
}