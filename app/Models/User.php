<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\UserRole;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     // Аксессор: возвращает enum, а не строку
    public function getRoleAttribute($value): UserRole
    {
        return UserRole::from($value);
    }

    // Мутатор: сохраняет значение enum
    public function setRoleAttribute($value): void
    {
        $this->attributes['role'] = $value instanceof UserRole ? $value->value : $value;
    }

    // Проверка роли
    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }   

    public function isCustomer(): bool
    {
        return $this->role === UserRole::CUSTOMER;
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

}
