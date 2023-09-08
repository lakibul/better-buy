<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * App\Model\Admin
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property int $admin_role_id
 * @property string $image
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Model\AdminRole|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAdminRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $f_name
 * @property string|null $l_name
 * @property int $type ['Admin'=>0, 'Agent'=>1, 'Customer'=>2]
 * @property int $two_factor
 * @property int $is_active
 * @property int $is_phone_verified
 * @property int $is_email_verified
 * @property string|null $identification_type
 * @property string|null $identification_number
 * @property string $identification_image
 * @property string $is_kyc_verified
 * @property string|null $referral_id
 * @property string|null $last_active_at
 * @property string|null $unique_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereFName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIdentificationImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIdentificationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIdentificationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsEmailVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsKycVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsPhoneVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereLName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereLastActiveAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereReferralId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereTwoFactor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUniqueId($value)
 */
class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $fillable = [
        'last_active_at',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(AdminRole::class, 'admin_role_id');
    }
}
