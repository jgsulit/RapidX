<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Department;
use App\Model\UserAccess;
use App\Model\UserLevel;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function departments() {
    //     return $this->hasOne(Department::class, 'department_id', 'department_id');
    // }

    public function user_access_details() {
        return $this->hasMany(UserAccess::class, 'user_id', 'id');
    }

    public function department_info() {
        return $this->hasOne(Department::class, 'department_id', 'department_id');
    }

    public function user_level_info() {
        return $this->hasOne(UserLevel::class, 'user_level_id', 'user_level_id');
    }
}
