<?php

declare(strict_types=1);

namespace Domain\User\Repository;

use Dof\Framework\DDD\Repository;

/**
 * @Implementor(Domain\User\Storage\MySQL\UserORM)
 * @Entity(Domain\User\Entity\User)
 */
interface UserRepository extends Repository
{
    public function findByEmail(string $email);
}
