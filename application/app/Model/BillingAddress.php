<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\BillingAddress
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string|null $contact_person_name
 * @property string|null $address_type
 * @property string|null $address
 * @property string|null $city
 * @property int|null $zip
 * @property string|null $phone
 * @property string|null $state
 * @property string|null $country
 * @property string|null $latitude
 * @property string|null $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereAddressType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereContactPersonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingAddress whereZip($value)
 * @mixin \Eloquent
 */
class BillingAddress extends Model
{
    use HasFactory;

}
