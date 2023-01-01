<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DapodikPribadi extends Model
{
    protected $table = 'dapodik_pribadi';
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
