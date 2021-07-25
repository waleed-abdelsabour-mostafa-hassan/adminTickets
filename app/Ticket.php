<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    // status
    public function status()
    {
        $array=[
            0=>'معلقة',
            1=>'مفتوحة',
            2=>'مغلقة',
            3=>'تم إعادة الفتح',
        ];
        return  $array[$this->status];
    }
    //belongsTo
    // owner
    public function owner()
    {
        return $this->belongsTo('App\User','owner_id','id');
    }
    // assigned
    public function assigned()
    {
        return $this->belongsTo('App\User','assigned_id','id');
    }
}
