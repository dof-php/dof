<?php

declare(strict_types=1);

namespace Domain\User\Entity;

use Dof\Framework\DDD\Entity;

/**
 * @Repository(Domain\User\Repository\UserRepository)
 * @Title(sds)
 */
class User extends Entity
{
    /**
     * @Title(User nickname)
     * @Type(String)
     */
    protected $nickname;

    /**
     * @Title(User realname)
     * @Type(String)
     */
    protected $realname;

    /**
     * @Title(User email account)
     * @Type(String)
     * @Validator(email)
     */
    protected $email;

    /**
     * @Title(User mobile account)
     * @Type(String)
     * @Validator(mobile.cn)
     */
    protected $mobile;

    /**
     * @Title(User account password)
     * @Type(String)
     * @Comment(clients will never known)
     */
    protected $password;

    /**
     * @Title(User registered timestamp)
     * @Argument(format){0[tpl]=Y-m-d H:i:s&0[demo]=2018-12-16 19:05:44&1[tpl]=y/m/d H:i:s&1[demo]=18/12/16 19:05:44&2[tmp]=d/m/y H:i:s&2[demo]=16/12/2018 19:05:44&default=1}
     * @Type(int)
     */
    protected $createdAt;
}
