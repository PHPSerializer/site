<?php

namespace NilPortugues\PhpSerializer\Domain\Github;

interface Repository
{
    /**
     * @param RepoId $repoId
     * @return Repo[]
     */
    public function findLatestRelease(RepoId $repoId);

    /**
     * @param RepoId[] $repoIds
     * @return RepoLatest[]
     */
    public function findLatestReleases(array $repoIds);

    /**
     * @param RepoId $repoId
     * @return Repo
     */
    public function find(RepoId $repoId);

    /**
     * @param RepoId[] $repoIds
     * @return Repo[]
     */
    public function findMany(array $repoIds);
}
