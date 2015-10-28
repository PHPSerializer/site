<?php

namespace NilPortugues\PhpSerializer\Infrastructure\Repository;

use NilPortugues\PhpSerializer\Domain\Github\Repo;
use NilPortugues\PhpSerializer\Domain\Github\RepoId;
use NilPortugues\PhpSerializer\Domain\Github\RepoLatest;
use NilPortugues\PhpSerializer\Domain\Github\Repository;

/**
 * Class GitRepoRepository
 * @package NilPortugues\PhpSerializer\Infrastructure\Repository
 */
class GitRepoRepository implements Repository
{
    /**
     * @var GitApiVersion3Repository
     */
    private $api;

    /**
     * @param GitApiVersion3Repository $apiRepository
     */
    public function __construct(GitApiVersion3Repository $apiRepository)
    {
        $this->api = $apiRepository;
    }

    /**
     * @param RepoId $repoId
     * @return RepoLatest
     */
    public function findLatestRelease(RepoId $repoId)
    {
        return $this->api->findLatestRelease($repoId);
    }

    /**
     * @param RepoId[] $repoIds
     * @return RepoLatest[]
     */
    public function findLatestReleases(array $repoIds)
    {
        return $this->api->findLatestReleases($repoIds);
    }

    /**
     * @param RepoId $repoId
     * @return Repo
     */
    public function find(RepoId $repoId)
    {
        return $this->api->find($repoId);
    }

    /**
     * @param RepoId[] $repoIds
     * @return Repo[]
     */
    public function findMany(array $repoIds)
    {
        return $this->api->findMany($repoIds);
    }
}
