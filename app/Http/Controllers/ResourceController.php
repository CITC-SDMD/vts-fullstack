<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\ReferralAgencyRepositoryInterface;
use App\Interface\Repositories\UserRepositoryInterface;

class ResourceController extends Controller
{
    private $referralAgencyRepository;

    private $userRepository;

    public function __construct(
        ReferralAgencyRepositoryInterface $referralAgencyRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->middleware('auth');
        $this->referralAgencyRepository = $referralAgencyRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $agencies = $this->referralAgencyRepository->resource();
        $users = $this->userRepository->showAll();

        return view('pages.resources', [
            'agencies' => $agencies,
            'paginate' => $agencies->links('components.pagination'),
            'users' => $users,
        ]);
    }
}
