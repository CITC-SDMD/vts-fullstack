<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Interface\Repositories\UserRepositoryInterface;
use App\Interface\Services\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginRequest $request)
    {
        $user = $this->userRepository->showByEmail($request->email);

        if (!$user) {
            Alert::toast('No account associated with email address provided.', 'Toast Type');

            return back();
        }

        if (!Hash::check($request->password, $user->password)) {
            Alert::toast('Invalid password', 'Toast Type');

            return back();
        }

        Auth::login($user);
    }
}
