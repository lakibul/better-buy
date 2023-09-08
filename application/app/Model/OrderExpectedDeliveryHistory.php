<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\OrderExpectedDeliveryHistory
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property string $user_type
 * @property string $expected_delivery_date
 * @property string|null $cause
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderExpectedDeliveryHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderExpectedDeliveryHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderExpectedDeliveryHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderExpectedDeliveryHistory whereCause($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderExpectedDeliveryHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderExpectedDeliveryHistory whereExpectedDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderExpectedDeliveryHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderExpectedDeliveryHistory whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderExpectedDeliveryHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderExpectedDeliveryHistory whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderExpectedDeliveryHistory whereUserType($value)
 * @mixin \Eloquent
 */
class OrderExpectedDeliveryHistory extends Model
{
    use HasFactory;
}
