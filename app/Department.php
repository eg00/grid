<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Department
 *
 * @property-read mixed $max_salary
 * @property-read mixed $people_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Membership[] $memberships
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Person[] $people
 * @mixin \Eloquent
 */
class Department extends Model
{
    protected $fillable = ['title'];

    public function people()
    {
        return $this->hasManyThrough(
            Person::class,
            Membership::class,
            'department_id',
            'id',
            'id',
            'person_id'
        );
    }

    public function memberships()
    {
        return $this->belongsToMany(Membership::class, 'memberships',
            'department_id', 'person_id')
            // для обновления timestamps
            ->withTimestamps();
    }

    public function getMaxSalaryAttribute()
    {
       return $this->people->max('salary');
    }
    public function getPeopleCountAttribute()
    {
        return $this->people->count();
    }
}
