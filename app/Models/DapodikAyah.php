<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DapodikAyah extends Model
{
    protected $table = 'dapodik_ayah';
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
