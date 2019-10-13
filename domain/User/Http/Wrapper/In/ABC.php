<?php

declare(strict_types=1);

namespace Domain\User\Http\Wrapper\In;

/**
 * @Title(sdafdsfdas)
 */
class ABC
{
    /**
     * @Title(test var)
     * @Mobile(tw)
     * @Type(String)
     * @Need()
     * @Default(13344445558)
     * @In(13344445555,13344445558)
     */
    private $var;

    /**
     * @Title(demo var)
     * @NeedIfHas(var)
     * @Type(String)
     * @Ip()
     */
    private $a;
}
