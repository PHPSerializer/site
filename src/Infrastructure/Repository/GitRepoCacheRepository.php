<?php

namespace NilPortugues\PhpSerializer\Infrastructure\Repository;

use NilPortugues\Cache\Cache;
use NilPortugues\PhpSerializer\Domain\Github\CacheRepository;

class GitRepoCacheRepository implements CacheRepository
{
    /**
     * @var Cache
     */
    private $cache;

    /**
     * @param Cache $cache
     */
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Returns the cached value or null.
     *
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->cache->get($key);
    }

    /**
     * Sets a value in the cache.
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        $this->cache->set($key, $value);
    }
}
