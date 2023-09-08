<?php

namespace App\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Model\EcomAdminActivityLog
 *
 * @property-read Admin|null $admin
 * @method static Builder|EcomAdminActivityLog newModelQuery()
 * @method static Builder|EcomAdminActivityLog newQuery()
 * @method static Builder|EcomAdminActivityLog query()
 * @mixin Eloquent
 */

class EcomAdminActivityLog extends Model
{
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }
}
