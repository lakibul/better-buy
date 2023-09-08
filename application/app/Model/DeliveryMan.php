<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Model\DeliveryMan
 *
 * @property int $id
 * @property int|null $seller_id
 * @property string|null $f_name
 * @property string|null $l_name
 * @property string|null $address
 * @property string|null $country_code
 * @property string $phone
 * @property string|null $email
 * @property string|null $identity_number
 * @property string|null $identity_type
 * @property string|null $identity_image
 * @property string|null $image
 * @property string $password
 * @property string|null $bank_name
 * @property string|null $branch
 * @property string|null $account_no
 * @property string|null $holder_name
 * @property int $is_active
 * @property int $is_online
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $auth_token
 * @property string|null $fcm_token
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Chatting[] $chats
 * @property-read int|null $chats_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Review[] $rating
 * @property-read int|null $rating_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Review[] $review
 * @property-read int|null $review_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\DeliveryManTransaction[] $transactions
 * @property-read int|null $transactions_count
 * @property-read \App\Model\DeliverymanWallet|null $wallet
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereAccountNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereAuthToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereFName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereFcmToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereHolderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereIdentityImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereIdentityNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereIdentityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereIsOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereLName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DeliveryMan extends Model
{
    protected $hidden = ['password','auth_token'];

    protected $casts = [
        'is_active'=>'integer'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class,'delivery_man_id');
    }

    public function wallet()
    {
        return $this->hasOne(DeliverymanWallet::class);
    }

    public function transactions()
    {
        return $this->hasMany(DeliveryManTransaction::class);
    }
    public function chats()
    {
        return $this->hasMany(Chatting::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class, 'delivery_man_id');
    }

    public function rating(){
        return $this->hasMany(Review::class)
            ->select(DB::raw('avg(rating) average, delivery_man_id'))
            ->groupBy('delivery_man_id');
    }
}
