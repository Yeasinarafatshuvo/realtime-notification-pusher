<?php

namespace App\Http\Controllers;

use App\Events\PrivateEvent;
use App\Events\PublicEvent;
use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        event(new PublicEvent());
        return "Event is fired";
    }

    public function private()
    {
        $users = User::all();
        foreach ($users as $key => $user) {
            event(new PrivateEvent($user->id));
            $user->notify(new TestNotification());
        }
        
        return "Event is fired";
    }
}
