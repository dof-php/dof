<?php

declare(strict_types=1);

namespace Domain\Http\Port;

/**
 * @Author(demo@dofphp.org)
 */
class Dof
{
    /**
     * @Route(/)
     * @Verb(get)
     * @Title(Dof Hello World)
     * @Mimeout(json)
     */
    public function hello()
    {
        return ['Dof' => 'Hello, world!'];
    }
}
