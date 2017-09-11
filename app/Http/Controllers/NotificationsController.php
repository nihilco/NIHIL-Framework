<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    public function index()
    {
        return auth()->user()->unreadNotifications;
    }

    public function store()
    {

    }

    public function create()
    {
        return view('notifications.create');
    }

    public function show()
    {
        
    }

    public function destroy(Notification $notification)
    {
        //return [auth()->id(), $notification->notifiable_id, $notification->notifiable_type];
        $this->authorize('delete', $notification);
        
        $notification->markAsRead();
    }
}
