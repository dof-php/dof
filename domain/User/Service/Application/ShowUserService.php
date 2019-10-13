<?php

declare(strict_types=1);

namespace Domain\User\Service\Application;

use Dof\Framework\DDD\Service;
use Domain\User\Repository\UserRepository;
use Domain\User\Assembler\User;

class ShowUserService extends Service
{
    private $id;
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        return $this->repository->find($this->id);

        // $this->__setCode(400);
        // $this->__setInfo('bad reqeust');
    }

    /**
     * Setter for id
     *
     * @param int $id
     * @return ShowUserService
     */
    public function setId(int $id)
    {
        $this->id = $id;
    
        return $this;
    }
}
