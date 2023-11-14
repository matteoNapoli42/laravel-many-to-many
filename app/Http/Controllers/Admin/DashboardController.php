<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_users = User::count();
        $total_projects = Project::count();
        return view('admin.dashboard', compact(['total_users', 'total_projects']));
    }
}
