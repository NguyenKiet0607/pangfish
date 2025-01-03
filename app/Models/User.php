<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'role',
        'password',
        'status',
        'coin',
        'total_credit',
        'staff_id',
        'tenant_code',
        'phone',
        'phone_zalo',
        'ip',
        'expired_time'
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
        'password' => 'hashed',
    ];

    /**
     * Get list
     *
     * @param array $condition
     * @param array $select
     * @return \Illuminate\Database\Eloquent\Builder || null
     */
    public static function getAll(array $condition = [], array $select = [], $returnQuery = false)
    {
        $query = self::query();
        $query->select($select);

        if (!empty($condition['id'])) {
            $query->where('id', $condition['id']);
        }

        $currentAdmin = Auth::guard('admin')->user();
        $currentAdminRole = $currentAdmin->role;
        $currentAdminId = $currentAdmin->id;

        //admin chi tim duoc theo ten, khong list duoc
        if ($currentAdminRole == 3 && empty($condition['name']) && empty($condition['start_date']) && empty($condition['end_date']) && empty($condition['start_id']) && empty($condition['end_id'])) {
            $query->where('username', '=', '');
        }

        if ($currentAdminRole == 3) {
            if (!empty($condition['name'])) {
                $query->where(function ($q) use ($condition) {
                    $q->where('username', 'like', '%' . $condition['name'] . '%')
                        ->orWhere('name', 'like', '%' . $condition['name'] . '%');
                });
            }

            $query->where(function ($q) use ($currentAdminId) {
                $q->where('staff_id', $currentAdminId)
                    ->orWhereNull('staff_id');
            });
        }

        if (Auth::guard('admin')->user()->role != 3  &&  !empty($condition['name'])) {
            $query->where(function ($q) use ($condition) {
                $q->where('username', 'like', '%' . $condition['name'] . '%')
                    ->orWhere('name', 'like', '%' . $condition['name'] . '%');
            });
        }

        // Thêm filter theo khoảng ngày
        if (!empty($condition['start_date']) && !empty($condition['end_date'])) {
            $query->whereBetween('created_at', [
                $condition['start_date'] . ' 00:00:00',
                $condition['end_date'] . ' 23:59:59'
            ]);
        }

        // Thêm filter theo khoảng ID
        if (!empty($condition['start_id']) && !empty($condition['end_id'])) {
            $query->whereBetween('id', [$condition['start_id'], $condition['end_id']]);
        }

        if ($returnQuery) {
            return $query;
        }
        return $query->all();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
