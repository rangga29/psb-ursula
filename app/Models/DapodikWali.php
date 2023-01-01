<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DapodikWali extends Model
{
    protected $table = 'dapodik_wali';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
