<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    // type
    static function type()
    {
        $arry=[
            'super_admin'=>'مسئول عام',
            'admin'=>'مسئول',
            'user'=>'مستخدم',
        ];
        return $arry;
    }
    // get type
    public function getType()
    {
        return self::type()[$this->type];
    }
    // check super admin
    public function isAdmin()
    {
        if($this->type == 'super_admin')
        return true;
    }
    /**
     * operations relations
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // my own tickets
    public function ownerTickets()
    {
        return $this->hasMany('App\Ticket','owner_id','id');
    }
    // my assign tickets
    public function assignedTickets()
    {
        return $this->hasMany('App\Ticket','assigned_id','id');
    }
    // my assign tickets
     // notifications
     public function notifications()
     {
         return $this->hasMany('App\Notification','user_id','id');
     }
    /********************************/
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','region_id','phone','identity','type','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
