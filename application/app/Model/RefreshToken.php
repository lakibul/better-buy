<?php

namespace App\Model;

use Laravel\Passport\RefreshToken as PassportRefreshToken;

/**
 * App\Model\RefreshToken
 *
 * @property string $id
 * @property string $access_token_id
 * @property bool $revoked
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property-read \App\Model\Token|null $accessToken
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereAccessTokenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefreshToken whereRevoked($value)
 * @mixin \Eloquent
 */
class RefreshToken extends PassportRefreshToken
{
    protected $connection = 'super_mysql';
}
