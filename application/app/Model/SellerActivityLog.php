<?php

namespace App\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Model\SellerActivityLog
 *
 * @property-read Seller|null $seller
 * @method static Builder|SellerActivityLog newModelQuery()
 * @method static Builder|SellerActivityLog newQuery()
 * @method static Builder|SellerActivityLog query()
 * @mixin Eloquent
 */
class SellerActivityLog extends Model
{
    use HasFactory;

    protected $connection = 'log_mysql';

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class, 'user_id', 'id');
    }
}
