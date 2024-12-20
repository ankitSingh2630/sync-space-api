<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens; // Make sure this is imported

class User extends Authenticatable
{
    use HasFactory, HasApiTokens; // Add the HasApiTokens trait
}

