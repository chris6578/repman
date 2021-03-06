<?php

declare(strict_types=1);

namespace Buddy\Repman\Service\Dist\Storage;

use Buddy\Repman\Service\Dist;
use Buddy\Repman\Service\Dist\Storage;
use Munus\Collection\GenericList;

/**
 * @codeCoverageIgnore
 */
final class InMemoryStorage implements Storage
{
    /**
     * @var array<string,string>
     */
    private $dists = [];

    public function has(Dist $dist): bool
    {
        return isset($this->dists[$dist->ref()]);
    }

    /**
     * @param string[] $headers
     */
    public function download(string $url, Dist $dist, array $headers = []): void
    {
        $this->dists[$dist->ref()] = $url;
    }

    public function filename(Dist $dist): string
    {
        return sprintf(
            '%s/dist/%s/%s_%s.%s',
            $dist->repo(),
            $dist->package(),
            $dist->version(),
            $dist->ref(),
            $dist->format()
        );
    }

    public function packages(string $repo): GenericList
    {
        return GenericList::ofAll($this->dists);
    }

    public function remove(string $packageName): void
    {
        // TODO: Implement remove() method.
    }
}
