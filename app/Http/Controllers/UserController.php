<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\ReferralAgencyRepositoryInterface;
use App\Interface\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    private $userRepository;

    private $referralAgencyRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ReferralAgencyRepositoryInterface $referralAgencyRepository
    ) {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->referralAgencyRepository = $referralAgencyRepository;
    }

    public function index()
    {
        $users = $this->userRepository->index();
        $agencies = $this->referralAgencyRepository->index();

        return view('pages.users', [
            'users' => $users,
            'agencies' => $agencies,
            'paginate' => $users->links('components.pagination'),
        ]);
    }

    public function store(Request $request)
    {
        $this->userRepository->create($request);

        Alert::success('Success', 'User successfully created.');

        return back();
    }

    public function show(string $uuid)
    {
        $user = $this->userRepository->showByUuid($uuid);

        return view('users.user-profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, string $uuid)
    {
        $this->userRepository->update($request, $uuid);

        Alert::success('Success', 'Profile updated successfully.');

        return back();
    }

    public function search(Request $request)
    {
        $users = $this->userRepository->search($request);
        $agencies = $this->referralAgencyRepository->index();

        return view('pages.users', [
            'users' => $users,
            'agencies' => $agencies,
        ]);
    }
}
