<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Membership
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Person[] $person
 * @mixin \Eloquent
 */
class Membership extends Model
{
    public function person()
    {
        return $this->hasMany(Person::class, 'id', 'person_id');
    }
}
