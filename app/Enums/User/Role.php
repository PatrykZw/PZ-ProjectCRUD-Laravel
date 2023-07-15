<?php

namespace App\Enums\User;

class Role
{
    const Admin = 'admin';
    const User = 'user';




    const TYPES = [
        self::Admin,
        self::User
    ];

}