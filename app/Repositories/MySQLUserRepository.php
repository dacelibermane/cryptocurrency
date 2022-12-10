<?php declare(strict_types=1);

namespace App\Repositories;

use App\Database;
use App\Models\User;
use App\Services\RegisterServiceRequest;

class MySQLUserRepository implements UserRepository
{
    public function addUsers(RegisterServiceRequest $request): void
    {
        $queryBuilder = (Database::getConnection())->createQueryBuilder();
        $queryBuilder->insert('users')
            ->values([
                'name' => '?',
                'email' => '?',
                'password' => '?'
            ])
            ->setParameter(0, $request->getName())
            ->setParameter(1, $request->getEmail())
            ->setParameter(2, password_hash($request->getPassword(), PASSWORD_DEFAULT))
            ->executeQuery();
    }
}