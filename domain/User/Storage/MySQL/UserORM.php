<?php

declare(strict_types=1);

namespace Domain\User\Storage\MySQL;

use Dof\Framework\DDD\Storage;
use Domain\User\Repository\UserRepository;

/**
 * @Repository(Domain\User\Repository\UserRepository)
 * @Driver(mysql)
 * @Connection(mysql57-rw-local)
 * @Database(online)
 * @Table(user)
 * @Prefix(ol_)
 */
class UserORM extends Storage implements UserRepository
{
    /**
     * @column(id)
     * @type(int)
     * @length(10)
     * @primary(1)
     * @notnull(1)
     */
    protected $id;

    /**
     * @column(nickname)
     * @type(varchar)
     * @length(8)
     * @notnull(1)
     */
    private $nickname;

    /**
     * @column(name)
     * @type(varchar)
     * @length(8)
     * @notnull(1)
     */
    private $realname;

    /**
     * @column(email)
     * @type(varchar)
     * @length(64)
     * @notnull(1)
     */
    private $email;

    /**
     * @column(mobile)
     * @type(char)
     * @length(16)
     * @notnull(1)
     */
    private $mobile;

    /**
     * @column(password)
     * @type(varchar)
     * @length(128)
     * @notnull(1)
     */
    private $password;

    /**
     * @column(create_time)
     * @type(int)
     * @unsigned(1)
     * @default(CURRENT_TIMESTAMP)
     * @notnull(1)
     */
    private $createdAt;

    public function findByEmail(string $email)
    {
        // pd($this->convert($this->builder()->first()));
        // pd($this->find(543));
        // pd($this->builder()->where('id', 543)->set('name', 'foo1'));
        // dd($this->builder()->where('id', 543)->update(['name' => 'foo2', 'email' => '1@2.com2']));
        // dd($this->builder()->where('id', 552)->delete());
        // pd(static::init()->storage()->deletes(564, 565, 566));
        // dd($this->storage()->deletes(564, 565, 566));
        // dd($this->builder()->add(['mobile' => '1300000001', 'nickname' => 'foo3']));
        // dd($this->builder()->insert([['mobile' => '1300000001', 'nickname' => 'foo4'], ['mobile' => '1300000002', 'nickname2' => 'foo5']]));
    }
}
