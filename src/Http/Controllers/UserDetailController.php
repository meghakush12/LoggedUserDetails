<?php

namespace Userdetails\Loggeduser\Http\Controllers;

use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


class UserDetailController extends Controller
{

    public function index()
    {

        $user_details = DB::table('user_access_details')->get();

        return view('loggeduser::user',['user_details'=>$user_details]);

    }
}
