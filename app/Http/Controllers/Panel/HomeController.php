<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Log;
use App\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->title = 'Dashboard';
    }
    
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data['title'] = $this->title." - ".env('APP_NAME', 'Awesome Website');
        $data['pagetitle'] = $this->title;
        return view('backend.dashboard', $data);
    }
}
