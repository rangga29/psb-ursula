<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, SoftDeletes;

    protected $table = 'users';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function tbtk_registration()
    {
        return $this->belongsTo(TbtkRegistration::class);
    }

    public function sd_registration()
    {
        return $this->belongsTo(SdRegistration::class);
    }

    public function smp_registration()
    {
        return $this->belongsTo(SmpRegistration::class);
    }

    public function dapodik_pribadi()
    {
        return $this->belongsTo(DapodikPribadi::class);
    }

    public function dapodik_kependudukan()
    {
        return $this->belongsTo(DapodikKependudukan::class);
    }

    public function dapodik_ayah()
    {
        return $this->belongsTo(DapodikAyah::class);
    }

    public function dapodik_ibu()
    {
        return $this->belongsTo(DapodikIbu::class);
    }

    public function dapodik_wali()
    {
        return $this->belongsTo(DapodikWali::class);
    }

    public function getRouteKeyName()
    {
        return 'token';
    }
}
