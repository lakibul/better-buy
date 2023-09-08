<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ShippingAddress
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string|null $contact_person_name
 * @property string $address_type
 * @property string|null $address
 * @property string|null $city
 * @property string|null $zip
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $state
 * @property string|null $country
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int|null $is_billing
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereAddressType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereContactPersonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereIsBilling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingAddress whereZip($value)
 * @mixin \Eloquent
 */
class ShippingAddress extends Model
{
    protected $guarded = [];
    protected $casts = [
        'customer_id' => 'integer',
        'is_billing' => 'integer',
    ];
}
