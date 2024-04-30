<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name', 'email', 'password', 'address', 'career_id'
    ];
    
    protected $hidden = [
        'password'
    ];

    // thêm quan hệ với Career
    public function career()
    {
        return $this->belongsTo('App\Models\Career');
    }
}
