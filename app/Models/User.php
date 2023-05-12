<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    protected $dates = [
        'last_login_at'
    ];

    public function getUser(): Collection
    {
        return DB::table($this->table)->select(['id', 'is_admin', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'status', 'image'])->get();
    }

    public function getUserById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'is_admin', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'status', 'image']);
    }
}
