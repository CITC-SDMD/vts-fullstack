<?php

namespace App\Repositories;

use App\Interface\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        $user = auth()->user();

        if ($user->agency_id == 13) {
            return User::with(['agency'])
                ->paginate(config('pagination.paginate'));
        }

        return User::with(['agency'])
            ->where('agency_id', $user->agency_id)
            ->paginate(config('pagination.paginate'));
    }

    public function showAll()
    {
        return User::with(['agency'])->get();
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
        return User::with(['agency'])
            ->where('uuid', $uuid)
            ->first();
    }

    public function showByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function update(object $payload, string $uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        $user->firstname = $payload->firstname;
        $user->lastname = $payload->lastname;
        $user->contact_number = $payload->contact_number;
        $user->agency_address = $payload->agency_address;
        $user->email = $payload->email;
        if ($payload->password) {
            $user->password = Hash::make($payload->password);
        }
        $user->save();

        return $user->fresh();
    }

    public function search(object $payload)
    {
        return User::with(['agency'])
            ->where(function ($query) use ($payload) {
                $query->where('firstname', 'LIKE', "%$payload->search%")
                    ->orWhere('lastname', 'LIKE', "%$payload->search%");
            })
            ->orWhereHas('agency', function ($query) use ($payload) {
                $query->where('agency_name', 'LIKE', "%$payload->search%");
            })
            ->orderBy('id', 'desc')
            ->get();
    }
}
