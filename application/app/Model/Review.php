<?php

namespace App\Model;

use App\User;
use Hoyvoy\CrossDatabase\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Model\Review
 *
 * @property int $id
 * @property int $product_id
 * @property int $customer_id
 * @property int|null $delivery_man_id
 * @property int|null $order_id
 * @property string|null $comment
 * @property string|null $attachment
 * @property int $rating
 * @property int $status
 * @property int $is_saved
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $customer
 * @property-read \App\Model\DeliveryMan|null $delivery_man
 * @property-read \App\Model\Order|null $order
 * @property-read \App\Model\Product|null $product
 * @property-read User|null $user
 * @method static Builder|Review active()
 * @method static Builder|Review newModelQuery()
 * @method static Builder|Review newQuery()
 * @method static Builder|Review query()
 * @method static Builder|Review whereAttachment($value)
 * @method static Builder|Review whereComment($value)
 * @method static Builder|Review whereCreatedAt($value)
 * @method static Builder|Review whereCustomerId($value)
 * @method static Builder|Review whereDeliveryManId($value)
 * @method static Builder|Review whereId($value)
 * @method static Builder|Review whereIsSaved($value)
 * @method static Builder|Review whereOrderId($value)
 * @method static Builder|Review whereProductId($value)
 * @method static Builder|Review whereRating($value)
 * @method static Builder|Review whereStatus($value)
 * @method static Builder|Review whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Review extends Model
{
    protected $connection = 'mysql';

    protected $casts = [
        'product_id'  => 'integer',
        'customer_id' => 'integer',
        'rating'      => 'integer',
        'status'      => 'integer',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    protected $fillable = [
        'product_id',
        'customer_id',
        'delivery_man_id',
        'order_id',
        'comment',
        'attachment',
        'rating',
        'status',
    ];

    public function scopeActive($query)
    {
        $query->where('status',1);
    }
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'customer_id');
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function delivery_man()
    {
        return $this->belongsTo(DeliveryMan::class, 'delivery_man_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('active', function (Builder $builder) {
            if(str_contains(url()->current(), url('/').'/admin') || str_contains(url()->current(), url('/').'/seller') || str_contains(url()->current(), url('/').'/api/v2'))
            {
                $builder;
            }else{
                $builder->where('status',1);
            }

        });
    }
}
