<?php

namespace NilPortugues\PhpSerializer\Domain\Github;

interface CacheRepository
{
    /**
     * Returns the cached value or null.
     *
     * @param $key
     * @return Repo|null
     */
    public function get($key);

    /**
     * Sets a value in the cache.
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value);
}
