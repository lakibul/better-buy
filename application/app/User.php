<?php

namespace App;

use App\Model\Client;
use App\Model\Order;
use App\Model\ShippingAddress;
use App\Model\Token;
use App\Model\UserInterface;
use App\Model\Wishlist;
use Eloquent;
use Hoyvoy\CrossDatabase\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Passport\HasApiTokens;

/**
 * App\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $f_name
 * @property string|null $l_name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $image
 * @property string|null $street_address
 * @property Carbon|null $email_verified_at
 * @property int $type ['Admin'=>0, 'Agent'=>1, 'Customer'=>2]
 * @property int|null $role
 * @property string $password
 * @property string|null $last_active_at
 * @property string|null $unique_id
 * @property string|null $referral_id
 * @property string|null $gender
 * @property string|null $occupation
 * @property int $two_factor
 * @property string|null $fcm_token
 * @property string|null $country
 * @property string|null $city
 * @property string|null $zip
 * @property string|null $house_no
 * @property string|null $apartment_no
 * @property string|null $cm_firebase_token
 * @property int $is_active
 * @property string|null $payment_card_last_four
 * @property string|null $payment_card_brand
 * @property string|null $payment_card_fawry_token
 * @property string|null $login_medium
 * @property string|null $social_id
 * @property int $is_phone_verified
 * @property string|null $temporary_token
 * @property int $is_email_verified
 * @property float|null $wallet_balance
 * @property float|null $loyalty_point
 * @property string|null $identification_type
 * @property string|null $identification_number
 * @property string $identification_image
 * @property string $is_kyc_verified
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $access_token
 * @property-read Collection|Client[] $clients
 * @property-read int|null $clients_count
 * @property-read User|null $customer
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Order[] $orders
 * @property-read int|null $orders_count
 * @property-read ShippingAddress|null $shipping
 * @property-read Collection|Token[] $tokens
 * @property-read int|null $tokens_count
 * @property-read Collection|Wishlist[] $wish_list
 * @property-read int|null $wish_list_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereAccessToken($value)
 * @method static Builder|User whereApartmentNo($value)
 * @method static Builder|User whereCity($value)
 * @method static Builder|User whereCmFirebaseToken($value)
 * @method static Builder|User whereCountry($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFName($value)
 * @method static Builder|User whereFcmToken($value)
 * @method static Builder|User whereGender($value)
 * @method static Builder|User whereHouseNo($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIdentificationImage($value)
 * @method static Builder|User whereIdentificationNumber($value)
 * @method static Builder|User whereIdentificationType($value)
 * @method static Builder|User whereImage($value)
 * @method static Builder|User whereIsActive($value)
 * @method static Builder|User whereIsEmailVerified($value)
 * @method static Builder|User whereIsKycVerified($value)
 * @method static Builder|User whereIsPhoneVerified($value)
 * @method static Builder|User whereLName($value)
 * @method static Builder|User whereLastActiveAt($value)
 * @method static Builder|User whereLoginMedium($value)
 * @method static Builder|User whereLoyaltyPoint($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereOccupation($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePaymentCardBrand($value)
 * @method static Builder|User wherePaymentCardFawryToken($value)
 * @method static Builder|User wherePaymentCardLastFour($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User whereReferralId($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereRole($value)
 * @method static Builder|User whereSocialId($value)
 * @method static Builder|User whereStreetAddress($value)
 * @method static Builder|User whereTemporaryToken($value)
 * @method static Builder|User whereTwoFactor($value)
 * @method static Builder|User whereType($value)
 * @method static Builder|User whereUniqueId($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereWalletBalance($value)
 * @method static Builder|User whereZip($value)
 * @mixin Eloquent
 * @property string|null $pin
 * @method static Builder|User wherePin($value)
 */
class User extends UserInterface
{
    use Notifiable, HasApiTokens;

    protected $connection = 'super_mysql';

    protected $fillable = [
        'f_name',
        'l_name',
        'name',
        'email',
        'password',
        'phone',
        'image',
        'login_medium',
        'is_active',
        'social_id',
        'is_phone_verified',
        'temporary_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'integer',
        'is_phone_verified' => 'integer',
        'is_email_verified' => 'integer',
        'wallet_balance' => 'float',
        'loyalty_point' => 'float'
    ];

    public function wish_list(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'customer_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function shipping(): BelongsTo
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_address');
    }
}
