<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmpRegistration extends Model
{
    use SoftDeletes;

    protected $table = 'smp_registrations';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function registration_year()
    {
        return $this->belongsTo(Year::class, 'register_year');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'unique_code';
    }
}
