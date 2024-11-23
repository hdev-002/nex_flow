<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('base.user_management.users.table-list');
    }

    public function list(){
        return view('base.user_management.users.table-list');
    }

    public function create(){
        return view('base.user_management.users.create');
    }

    public function edit($id)
    {
        return view('base.user_management.users.edit', ['id' => $id]);
    }

}
