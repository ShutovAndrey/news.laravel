<?php

namespace App\Repositories;

use App\User;
use Laravel\Socialite\Two\User as UserOAuth;

class UserRepository
{
    public function getUserBySocialId(UserOAuth $user, string $socName)
    {
        $useInSystem = User::query()
            ->where('social_id', $user->id)
            ->where('type_auth', $socName)
            ->first();
        if (is_null($useInSystem)){
            $useInSystem = new User;
            $useInSystem -> fill([
                'name' => !empty($user->getNickname())? $user->getNickname(): '',
                'email' => !empty($user->getEmail())? $user->getEmail(): '',
                'password' => '',
                'social_id' => !empty($user->getId())? $user->getId(): '',
                'type_auth' => $socName,
                'email_verified_at' => now(),
                'avatar' => !empty($user->getAvatar())? $user->getAvatar(): ''
            ]);
            $useInSystem -> save();
        }
        return $useInSystem;
    }
}
