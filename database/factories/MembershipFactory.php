<?php

use App\Department;
use App\Person;

$factory->define(\App\Membership::class, function () {
    $departmentsCount = Department::all()->count();

    return [
        'department_id' => mt_rand(1, $departmentsCount),
    ];
});
