<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Person
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Department[] $departments
 * @property-write mixed $gender
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Membership[] $memberships
 * @property-write mixed $first_name
 * @property-write mixed $last_name
 * @property-write mixed $middle_name
 * @mixin \Eloquent
 */
class Person extends Model
{
    protected $fillable = ['first_name', 'last_name', 'middle_name', 'gender', 'salary'];
    public function departments()
    {
        return $this->hasManyThrough(
            Department::class,
            Membership::class,
            'person_id',
            'id',
            'id',
            'department_id'
            );
    }

    public function memberships()
    {
        return $this->belongsToMany(Membership::class, 'memberships', 'person_id', 'department_id')
            // для обновления timestamps
            ->withTimestamps();

    }


    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }
    public function setMiddleNameAttribute($value)
    {
        $this->attributes['middle_name'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function getGenderAttribute($value)
    {
        return $value === 'male' ? 'мужской' : 'женский';
    }


}
