<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    // store notification
    static function storenotification($user,$reactor,$content,$tickt_id)
    {
        $notf=new Notification();
        $notf->user_id=$user;
        $notf->reactor_id=$reactor;
        $notf->content=$content;
        $notf->tickt_id=$tickt_id;
        $notf->save();
    }
    // user
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    // reactor
    public function reactor()
    {
        return $this->belongsTo('App\User','reactor_id','id');
    }
}
