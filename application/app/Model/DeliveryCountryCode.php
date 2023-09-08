<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\DeliveryCountryCode
 *
 * @property int $id
 * @property string $country_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCountryCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCountryCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCountryCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCountryCode whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCountryCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCountryCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCountryCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DeliveryCountryCode extends Model
{
    use HasFactory;
    protected $fillable = ['country_code'];

}
