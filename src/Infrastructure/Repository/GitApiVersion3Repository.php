<?php

namespace NilPortugues\PhpSerializer\Infrastructure\Repository;

use NilPortugues\PhpSerializer\Domain\Github\CacheRepository;
use NilPortugues\PhpSerializer\Domain\Github\Repo;
use NilPortugues\PhpSerializer\Domain\Github\RepoId;
use NilPortugues\PhpSerializer\Domain\Github\RepoLatest;
use NilPortugues\PhpSerializer\Domain\Github\Repository;

class GitApiVersion3Repository implements Repository
{
    const MASTER_BRANCH = "https://api.github.com/repos/%s/%s";
    const LATEST_RELEASE = "https://api.github.com/repos/%s/%s/releases/latest";

    /**
     * @var CacheRepository
     */
    private $cache;


    /**
     * @param CacheRepository $cacheRepository
     */
    public function __construct(CacheRepository $cacheRepository)
    {
        $this->cache = $cacheRepository;
    }
    /**
     * @param RepoId $repoId
     * @return Repo
     */
    public function findLatestRelease(RepoId $repoId)
    {
        $response = file_get_contents(sprintf(self::LATEST_RELEASE, $repoId->vendor(), $repoId->repository()));
        $response = json_decode($response);

        return new RepoLatest(
            $response->tag_name,
            $response->tar_ball,
            $response->zip_file,
            $response->published_at
        );
    }

    /**
     * @param RepoId $repoId
     * @return mixed
     */
    public function find(RepoId $repoId)
    {
        $response = file_get_contents(sprintf(self::MASTER_BRANCH, $repoId->vendor(), $repoId->repository()));
        $response = json_decode($response);

        return new Repo(
            $response->full_name,
            $response->git_url,
            $response->svn_url,
            $response->updated_at
        );
    }

    /**
     * @param RepoId[] $repoIds
     * @return mixed
     */
    public function findMany(array $repoIds)
    {
        // TODO: Implement findMany() method.
    }
}
