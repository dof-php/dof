<?php

declare(strict_types=1);

namespace Domain\User\Http\Port\V1;

use Domain\User\Service\Application\ShowUserService;

/**
 * @Title(Do sth complex)
 * @Autonomy(1)
 * @Route(do-sth-complex)
 * @Author(me@dof.php)
 * @Verb(get)
 * @Suffix(json)
 * @MimeIn(json)
 * @MimeOut(json)
 * @Model(Domain\User\Entity\User)
 * @Assembler(Domain\User\Assembler\User)
 */
class DoSthComplex
{
    /**
     * @Title(手机号)
     * @Compatible(param_1,p1)
     * @Mobile(cn)
     * @In(1,2,3)
     * @Need(){sdf2a=32}
     */
    private $mobile;

    /**
     * @Title(Client Ip)
     * @Notes(dsdsd)
     * @Need(){dsafd=ds}
     * @Ipv4()
     */
    private $ip;

    /**
     * @Title(User Id)
     * @Need(){sdfa=32}
     * @Uint()
     */
    private $id;

    public function execute(ShowUserService $service)
    {
        return service(ShowUserService::class, ['id' => route()->params->api->id]);
    }
}
