<?php

declare(strict_types=1);

namespace Buddy\Repman\Query\User;

use Buddy\Repman\Query\User\Model\Package;
use Munus\Control\Option;

interface PackageQuery
{
    /**
     * @return Package[]
     */
    public function findAll(int $limit = 20, int $offset = 0): array;

    public function count(): int;

    /**
     * @return Option<Package>
     */
    public function getById(string $id): Option;
}