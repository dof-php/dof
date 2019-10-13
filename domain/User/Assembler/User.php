<?php

declare(strict_types=1);

namespace Domain\User\Assembler;

use Dof\Framework\DDD\Assembler;

class User extends Assembler
{
    protected $compatibles = [
        'id'   => 'id',
        'name' => 'realname',
        'created_at' => 'createdAt',
    ];

    protected $converters = [
        'mobile' => 'maskMobile',
        'password' => 'maskPassword',
        'createdAt' => 'formatCreateTime',
    ];

    public function formatCreateTime(int $createdAt = null, array $params = []) : string
    {
        if (! $createdAt) {
            return '';
        }

        $format = $params['format'] ?? '0';
        switch ($format) {
            case '2':
                $format = 'd/m/Y H:i:s';
                break;
            case '1':
                $format = 'y/m/d H:i:s';
                break;
            case '0':
            default:
                $format = null;
                break;
        }

        return fdate($createdAt, $format);
    }

    public function maskPassword(string $password)
    {
        return trim($password) ? 'set' : 'unset';
    }

    public function maskMobile(string $mobile)
    {
        $start = mb_substr($mobile, 0, 3);
        $end   = mb_substr($mobile, -4, 4);

        return $start.'****'.$end;
    }
}
