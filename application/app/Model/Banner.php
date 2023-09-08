<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Model\Banner
 *
 * @property int $id
 * @property string|null $photo
 * @property string $banner_type
 * @property int $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $url
 * @property string|null $resource_type
 * @property int|null $resource_id
 * @property-read \App\Model\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereBannerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereResourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereResourceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUrl($value)
 * @mixin \Eloquent
 */
class Banner extends Model
{
    protected $casts = [
        'published' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'resource_id' => 'integer',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'resource_id');
    }

}
