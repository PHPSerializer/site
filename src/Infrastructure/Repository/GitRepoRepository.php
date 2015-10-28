<?php

namespace NilPortugues\PhpSerializer\Infrastructure\Repository;

use NilPortugues\PhpSerializer\Domain\Github\Repo;
use NilPortugues\PhpSerializer\Domain\Github\CacheRepository;
use NilPortugues\PhpSerializer\Domain\Github\RepoId;
use NilPortugues\PhpSerializer\Domain\Github\Repository;

/**
 * Class GitRepoRepository
 * @package NilPortugues\PhpSerializer\Infrastructure\Repository
 */
class GitRepoRepository implements Repository
{
    /**
     * @var CacheRepository
     */
    private $cache;

    /**
     * @var GitApiVersion3Repository
     */
    private $api;

    /**
     * @param CacheRepository $cacheRepository
     * @param GitApiVersion3Repository $apiRepository
     */
    public function __construct(CacheRepository $cacheRepository, GitApiVersion3Repository $apiRepository)
    {
        $this->cache = $cacheRepository;
        $this->api = $apiRepository;
    }

    /**
     * @param RepoId $repoId
     * @return Repo
     */
    public function findLatestRelease(RepoId $repoId)
    {
        $key = $this->buildHashKey(__CLASS__, $repoId);
        $cached = $this->cache->get($key);

        if (null !== $cached) {
            return $cached;
        }

        $repo = $this->api->findLatestRelease($repoId);
        $this->cache->set($key, $repo);

        return $repo;
    }

    /**
     * @param string $key
     * @param RepoId $repoId
     * @return string
     */
    private function buildHashKey($key, RepoId $repoId)
    {
        return sprintf("%s:%s", $key, $repoId->repositoryPath());
    }

    /**
     * @param RepoId $repoId
     * @return Repo
     */
    public function find(RepoId $repoId)
    {
        // TODO: Implement find() method.
    }

    /**
     * @param RepoId[] $repoIds
     * @return Repo[]
     */
    public function findMany(array $repoIds)
    {
        $collection = [];
        foreach ($repoIds as $repoId) {
            $collection[] = $this->find($repoId);
        }

        return $collection;
    }
}
