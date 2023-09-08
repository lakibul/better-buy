<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\CartShipping
 *
 * @property int $id
 * @property string|null $cart_group_id
 * @property int|null $shipping_method_id
 * @property float $shipping_cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CartShipping newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartShipping newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartShipping query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartShipping whereCartGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartShipping whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartShipping whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartShipping whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartShipping whereShippingMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartShipping whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CartShipping extends Model
{
    //
}
