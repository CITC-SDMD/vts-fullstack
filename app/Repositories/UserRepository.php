<?php

namespace App\Repositories;

use App\Interface\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return User::paginate(config('pagination.paginate'));
    }

    public function create(object $payload)
    {
        $user = new User();
        $user->agency_id = $payload->agency_id;
        $user->firstname = $payload->firstname;
        $user->lastname = $payload->lastname;
        $user->contact_number = $payload->contact_number;
        $user->agency_address = $payload->agency_address;
        $user->email = $payload->email;
        $user->password = Hash::make($payload->password);
        $user->save();

        return $user->fresh();
    }

    public function showByUuid(string $uuid)
    {
        return User::where('uuid', $uuid)->first();
    }

    public function showByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function update(object $payload, int $userId)
    {
        $user = User::findOrFail($userId);
        $user->agency_id = $payload->agency_id;
        $user->firstname = $payload->firstname;
        $user->lastname = $payload->lastname;
        $user->contact_number = $payload->contact_number;
        $user->agency_address = $payload->agency_address;
        $user->email = $payload->email;
        $user->password = Hash::make($payload->password);
        $user->save();

        return $user->fresh();
    }
}
