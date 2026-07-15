<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as AdminAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Admin extends AdminAuthenticatable
{
    use HasApiTokens,Notifiable;
    protected $table = 'admins';
    protected $guarded = [];
    protected $hidden = ['password'];
}
