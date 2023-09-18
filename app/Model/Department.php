<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Department extends Model
{
    //
    protected $table = 'departments';
    
    // public function user() {
    // 	return $this->belongsTo(User::class);
    // }
}
