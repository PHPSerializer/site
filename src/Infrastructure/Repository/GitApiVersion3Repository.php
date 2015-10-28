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
     * @return RepoLatest
     */
    public function findLatestRelease(RepoId $repoId)
    {
        $hash = $this->buildHashKey(__METHOD__, $repoId);
        $data = $this->cache->get($hash);

        if (null !== $data) {
            return $data;
        }

        $response = $this->apiRequest(self::LATEST_RELEASE, $repoId);

        $latest = new RepoLatest(
            $response->tag_name, $response->tar_ball, $response->zip_file, $response->published_at
        );
        $this->cache->set($hash, $latest);

        return $latest;
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
     * @param $url
     * @param RepoId $repoId
     * @return mixed
     */
    private function apiRequest($url, RepoId $repoId)
    {
        $response = file_get_contents(sprintf($url, $repoId->vendor(), $repoId->repository()));
        return json_decode($response);
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

    /**
     * @param RepoId $repoId
     * @return Repo
     */
    public function find(RepoId $repoId)
    {
        $hash = $this->buildHashKey(__METHOD__, $repoId);
        $data = $this->cache->get($hash);

        if (null !== $data) {
            return $data;
        }

        $response = $this->apiRequest(self::MASTER_BRANCH, $repoId);

        $master = new Repo($response->full_name, $response->git_url, $response->svn_url, $response->updated_at);
        $this->cache->set($hash, $master);

        return $master;
    }
}
