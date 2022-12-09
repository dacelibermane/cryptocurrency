<?php declare(strict_types=1);

namespace App\Services;

use App\Repositories\MySQLUsersRepository;

class RegisterService
{
    private MySQLUsersRepository $usersRepository;

    public function __construct()
    {
        $this->usersRepository = new MySQLUsersRepository();
    }
    public function execute(RegisterServiceRequest $request): void
    {
        $this->usersRepository->addUserData($request);
    }
}