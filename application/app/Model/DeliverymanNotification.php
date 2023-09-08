<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\DeliverymanNotification
 *
 * @property int $id
 * @property int $delivery_man_id
 * @property int $order_id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanNotification whereDeliveryManId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanNotification whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanNotification whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanNotification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DeliverymanNotification extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}
