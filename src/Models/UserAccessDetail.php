<?php

namespace Userdetails\Loggeduser\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccessDetail extends Model
{
    use HasFactory;

    protected $table = 'user_access_details';
}
