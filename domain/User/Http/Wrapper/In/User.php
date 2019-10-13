<?php

declare(strict_types=1);

namespace Domain\User\Http\Wrapper\In;

/**
 * @Title(dsdsds)
 * @Notes(This is a demo wrapin)
 */
class User
{
    /**
     * @Title(User Id)
     * @Compatible(id,uid,userId,user_id)
     * @Need()
     * @Ciin(112,333)
     * @Type(Uint)
     */
    private $id;

    /**
     * @Title(客户端 IP 地址)
     * @Compatible(client_ip,ip)
     * @Need()
     * @Default(0.0.0.0)
     * @Type(String)
     * @Ip()
     */
    private $ip;

    /**
     * @Title(用户真实姓名)
     * @Compatible(realname,uname)
     * @NeedIfNo(email)
     * @Type(String)
     * @Min(2)
     */
    private $name;

    /**
     * @Title(用户电子邮箱)
     * @Compatible(mail_addr)
     * @Type(String)
     * @NeedIfNo(name)
     * @Email()
     */
    private $email;

    /**
     * @Title(附加数据)
     * @Type(AssocArray)
     * @Wrapin(ABC){list=1}
     */
    private $extra;
}
