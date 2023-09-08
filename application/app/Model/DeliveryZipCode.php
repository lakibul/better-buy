<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\DeliveryZipCode
 *
 * @property int $id
 * @property string $zipcode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryZipCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryZipCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryZipCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryZipCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryZipCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryZipCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryZipCode whereZipcode($value)
 * @mixin \Eloquent
 */
class DeliveryZipCode extends Model
{
    use HasFactory;
    protected $fillable = ['zipcode'];
}
