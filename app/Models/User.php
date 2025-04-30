<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'membershipType',
        'membership_status',
        'membership_start_date',
        'membership_end_date',
        'renewal_due_date',
        'payment_status',
        'membership_card_number',
        'guest_access_count',
        'last_seen',
        'is_online',
        'about',
        'level',
        'refer',
        'refer_date',
        'username',
        'facebook',
        'instagram',
        'address',
        'linkedin',
        'twitter',
        'birth_date',
        'city',
        'is_active',
        'is_system',
        'email_verified_at',
        'player_id',
        'is_subscribed',
        'country',
        'id_number',
        'language',
        'is_super_admin',
        'facebook_id',
        'google_id',
        'ip_address',
        'account_type',
        'mobile_number',
        'permissions',
        'profile_photo',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public static function getUserInfo($id)
    {
        $userinfo = User::find($id);

        return $userinfo;
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public static function getUserFullname($id)
    {
        $userinfo = User::find($id);

        return $userinfo ? $userinfo->name : '';
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
