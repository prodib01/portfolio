<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Education;

class EducationPolicy
{
    public function update(User $user, Education $education)
    {
        return $user->id === $education->user_id;
    }

    public function delete(User $user, Education $education)
    {
        return $user->id === $education->user_id;
    }
}
