<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail, CanResetPassword 
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'w_country_code',
        'whatsapp_no',
        'password',
        'primary_role',
        'profile_image_id',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'whatsapp_no_verified_at' => 'datetime',
    ];

    /**
     * Is active?
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->is_active;
    }

    /**
     * Is email verified?
     *
     * @return bool
     */
    public function isEmailVerified()
    {
        return ($this->email_verified_at != null);
    }

    /**
     * Get the image for the user.
     */
    public function profileImage()
    {
        return $this->hasOne(File::class, 'id', 'profile_image_id');
    }

    /**
     * User's primary role
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function primaryRole()
    {
        return $this->belongsTo(Role::class, 'primary_role');
    }

    /**
     * User's checker user
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function checkerUser()
    {
        return $this->belongsTo(Checker::class, 'id', 'user_id');
    }

    /**
     * User's validator user
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function validatorUser()
    {
        return $this->belongsTo(ValidatorUser::class, 'id', 'user_id');
    }

    /**
     * User's admin user
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function adminUser()
    {
        return $this->belongsTo(Admin::class, 'id', 'user_id');
    }

    /**
     * User's client user
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function clientUser()
    {
        return $this->belongsTo(Client::class, 'id', 'user_id');
    }

    /**
     * User's supplier user
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function supplierUser()
    {
        return $this->belongsTo(Supplier::class, 'id', 'user_id');
    }

    /**
     * Is this user an super admin?
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->primary_role == Role::ROLE_SUPER_ADMIN;
    }

    /**
     * Is this user an admin?
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->primary_role == Role::ROLE_ADMIN;
    }

    /**
     * Is this user an shop?
     *
     * @return bool
     */
    public function isChecker()
    {
        return $this->primary_role == Role::ROLE_CHECKER;
    }

    /**
     * Is this user an dealer?
     *
     * @return bool
     */
    public function isValidator()
    {
        return $this->primary_role == Role::ROLE_VALIDATOR;
    }


    /**
     * Is this user an client user?
     *
     * @return bool
     */
    public function isClient()
    {
        return $this->primary_role == Role::ROLE_CLIENT;
    }

    /**
     * Set active user
     *
     */
    public function setActiveUser()
    {
        $this->is_active = true;
    }

    /**
     * Set deactive user
     *
     */
    public function setDeactiveUser()
    {
        $this->is_active = false;
    }

    /**
     * For Authentication
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * For Authentication
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
