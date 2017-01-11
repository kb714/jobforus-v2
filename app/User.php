<?php

namespace JobForUs;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use JobForUs\Model\Membership;
use JobForUs\Model\Profile;
use JobForUs\Notifications\PasswordResetNotification;

class User extends Authenticatable
{
    use Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('JobForUs\Model\Profile');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function membership()
    {
        return $this->hasOne('JobForUs\Model\Membership');
    }

    public function coverLetters()
    {
        return $this->hasMany('JobForUs\Model\CoverLetters');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($user) {
            $user->profile()->delete();
            $user->membership()->delete();
            $user->coverLetters()->delete();
        });
    }

    /**
     * @param array $data
     * @return static
     */
    public static function build(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->profile()->save(new Profile($data));

        if($data['user_type'] == 4)
            $user->membership()->save(new Membership(['plan_id' => 1]));
        else
            $user->membership()->save(new Membership(['plan_id' => 2]));

        return $user;
    }

    public function getUserTypeParam()
    {
        if($this->attributes['user_type'] == 4)
            return 'Persona';
        return 'Empresa';
    }
}
