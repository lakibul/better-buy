<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Chatting
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $seller_id
 * @property int|null $admin_id
 * @property int|null $delivery_man_id
 * @property string $message
 * @property int $sent_by_customer
 * @property int $sent_by_seller
 * @property int|null $sent_by_admin
 * @property int|null $sent_by_delivery_man
 * @property int $seen_by_customer
 * @property int $seen_by_seller
 * @property int|null $seen_by_admin
 * @property int|null $seen_by_delivery_man
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $shop_id
 * @property-read \App\Model\Admin|null $admin
 * @property-read User|null $customer
 * @property-read \App\Model\DeliveryMan|null $delivery_man
 * @property-read \App\Model\Seller|null $seller_info
 * @property-read \App\Model\Shop|null $shop
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereDeliveryManId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereSeenByAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereSeenByCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereSeenByDeliveryMan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereSeenBySeller($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereSentByAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereSentByCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereSentByDeliveryMan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereSentBySeller($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting whereUserId($value)
 * @mixin \Eloquent
 */
class Chatting extends Model
{

    protected $casts = [
        'user_id' => 'integer',
        'status' => 'integer',
        'seller_id' => 'integer',
        'sent_by_customer' => 'integer',
        'sent_by_seller' => 'integer',
        'seen_by_customer' => 'integer',
        'seen_by_seller' => 'integer',
        'shop_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $guarded=[];

    public function seller_info()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function delivery_man()
    {
        return $this->belongsTo(DeliveryMan::class, 'delivery_man_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
