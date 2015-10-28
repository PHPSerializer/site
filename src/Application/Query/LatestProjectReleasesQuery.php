<?php

namespace NilPortugues\PhpSerializer\Application\Query;


/**
 * Class LatestProjectReleasesQuery
 * @package NilPortugues\PhpSerializer\Application\Query
 */
class LatestProjectReleasesQuery 
{
    /**
     * @param array $repositories
     */
    public function __construct(array $repositories)
    {
        $this->repositories = $repositories;
    }

    /**
     * @return array
     */
    public function repositories()
    {
        return $this->repositories;
    }
}