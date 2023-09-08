<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ShippingType
 *
 * @property int $id
 * @property int|null $seller_id
 * @property string|null $shipping_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingType whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingType whereShippingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShippingType extends Model
{
    use HasFactory;
    protected $connection = 'mysql';

    protected $casts = [
        'seller_id' => 'integer',
        'shipping_type' => 'string',
    ];

}
