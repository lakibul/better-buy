<?php

namespace App\Model;

use Laravel\Passport\PersonalAccessClient as PassportPersonalAccessClient;

/**
 * App\Model\PersonalAccessClient
 *
 * @property int $id
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessClient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PersonalAccessClient extends PassportPersonalAccessClient
{
    //
}
