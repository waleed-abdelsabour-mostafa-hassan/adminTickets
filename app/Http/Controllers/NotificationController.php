<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // notifications
    public function index()
    {
        $notifications=Auth::user()->notifications()->latest('created_at')->get();
        return view('admin.notifications',compact('notifications'));
    }
    // as read notification
    public function read(Notification $notf)
    {
        $notf->seen=1;
        $notf->save();
        return back();
    }
}
