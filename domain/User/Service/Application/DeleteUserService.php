<?php

declare(strict_types=1);

namespace Domain\User\Service\Application;

use Dof\Framework\DDD\Service;
use Domain\User\Repository\UserRepository;

class DeleteUserService extends Service
{
    private $uid;
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        return $this->repository->remove($this->uid);
    }

    /**
     * Setter for uid
     *
     * @param int $uid
     * @return DeleteUserService
     */
    public function setUid(int $uid)
    {
        $this->uid = $uid;
    
        return $this;
    }
}
