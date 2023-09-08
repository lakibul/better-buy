<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\DeliveryHistory
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $deliveryman_id
 * @property string|null $time
 * @property string|null $longitude
 * @property string|null $latitude
 * @property string|null $location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory whereDeliverymanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DeliveryHistory extends Model
{
    //
}
