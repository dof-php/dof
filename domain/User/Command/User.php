<?php

declare(strict_types=1);

namespace Domain\User\Command;

/**
 * @Cmd(user)
 * @Desc(User operations)
 * @Option(help){optional=1&default=__null__&comment=asdfa,asdfasdfa.asdfasdfa!@#$$%U}
 * @Option(verbose){optional=1&default=__null__}
 */
class User
{
    /**
     * @CMD(disable)
     * @Desc(Disable users by given ids)
     */
    public function disable($console)
    {
        $console->output(2322);
    }
}
