<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShuttleAllocation extends Model
{
    protected $table = 'users';
    protected $connection = 'mysql_shuttle_allocation';
}
