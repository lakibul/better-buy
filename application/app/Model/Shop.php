<?php

namespace App\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Model\Shop
 *
 * @property int $id
 * @property int $seller_id
 * @property string $name
 * @property string $address
 * @property string $contact
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $banner
 * @property-read Seller|null $seller
 * @method static Builder|Shop active()
 * @method static Builder|Shop newModelQuery()
 * @method static Builder|Shop newQuery()
 * @method static Builder|Shop query()
 * @method static Builder|Shop whereAddress($value)
 * @method static Builder|Shop whereBanner($value)
 * @method static Builder|Shop whereContact($value)
 * @method static Builder|Shop whereCreatedAt($value)
 * @method static Builder|Shop whereId($value)
 * @method static Builder|Shop whereImage($value)
 * @method static Builder|Shop whereName($value)
 * @method static Builder|Shop whereSellerId($value)
 * @method static Builder|Shop whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Shop extends Model
{
    protected $connection = 'mysql';

    protected $casts = [
        'seller_id ' => 'integer',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function scopeActive($query){
        return $query->whereHas('seller', function ($query) {
            $query->where(['status' => 'approved']);
        });
    }
}
