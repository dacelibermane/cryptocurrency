<?php declare(strict_types=1);

namespace App\Repositories;

use App\Services\RegisterServiceRequest;

interface UserRepository
{
    public function addUsers(RegisterServiceRequest $request): void;
}
