<?php

namespace App\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Passport\HasApiTokens;

/**
 * App\Model\Seller
 *
 * @property int $id
 * @property string|null $f_name
 * @property string|null $l_name
 * @property string|null $phone
 * @property string $image
 * @property string $email
 * @property string|null $password
 * @property string $status
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $bank_name
 * @property string|null $branch
 * @property string|null $account_no
 * @property string|null $holder_name
 * @property string|null $auth_token
 * @property float|null $sales_commission_percentage
 * @property string|null $gst
 * @property string|null $cm_firebase_token
 * @property int $pos_status
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Order[] $orders
 * @property-read int|null $orders_count
 * @property-read Collection|Product[] $product
 * @property-read int|null $product_count
 * @property-read Shop|null $shop
 * @property-read Collection|Shop[] $shops
 * @property-read int|null $shops_count
 * @property-read SellerWallet|null $wallet
 * @method static Builder|Seller approved()
 * @method static Builder|Seller newModelQuery()
 * @method static Builder|Seller newQuery()
 * @method static Builder|Seller query()
 * @method static Builder|Seller whereAccountNo($value)
 * @method static Builder|Seller whereAuthToken($value)
 * @method static Builder|Seller whereBankName($value)
 * @method static Builder|Seller whereBranch($value)
 * @method static Builder|Seller whereCmFirebaseToken($value)
 * @method static Builder|Seller whereCreatedAt($value)
 * @method static Builder|Seller whereEmail($value)
 * @method static Builder|Seller whereFName($value)
 * @method static Builder|Seller whereGst($value)
 * @method static Builder|Seller whereHolderName($value)
 * @method static Builder|Seller whereId($value)
 * @method static Builder|Seller whereImage($value)
 * @method static Builder|Seller whereLName($value)
 * @method static Builder|Seller wherePassword($value)
 * @method static Builder|Seller wherePhone($value)
 * @method static Builder|Seller wherePosStatus($value)
 * @method static Builder|Seller whereRememberToken($value)
 * @method static Builder|Seller whereSalesCommissionPercentage($value)
 * @method static Builder|Seller whereStatus($value)
 * @method static Builder|Seller whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|Client[] $clients
 * @property-read int|null $clients_count
 * @property-read Collection|Token[] $tokens
 * @property-read int|null $tokens_count
 */
class Seller extends SellerInterface
{
    use Notifiable, HasApiTokens;

    protected $connection = 'super_mysql';

    protected $casts = [
        'id' => 'integer',
        'orders_count' => 'integer',
        'product_count' => 'integer',
        'pos+status' => 'integer'
    ];

    public function scopeApproved($query)
    {
        return $query->where(['status' => 'approved']);
    }

    public function shop(): HasOne
    {
        return $this->hasOne(Shop::class, 'seller_id');
    }

    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class, 'seller_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'seller_id');
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'user_id')->where(['added_by' => 'seller']);
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(SellerWallet::class);
    }

}
