<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'years';
    protected $guarded = ['id'];

    public function tbtk_registrations()
    {
        return $this->hasMany(TbtkRegistration::class);
    }

    public function sd_registrations()
    {
        return $this->hasMany(SdRegistration::class);
    }

    public function smp_registrations()
    {
        return $this->hasMany(SmpRegistration::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
