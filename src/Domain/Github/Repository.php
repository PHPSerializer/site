<?php

namespace NilPortugues\PhpSerializer\Domain\Github;

interface Repository
{
    /**
     * @param RepoId $repoId
     * @return mixed
     */
    public function findLatestRelease(RepoId $repoId);

    /**
     * @param RepoId $repoId
     * @return mixed
     */
    public function find(RepoId $repoId);

    /**
     * @param RepoId[] $repoIds
     * @return mixed
     */
    public function findMany(array $repoIds);
}
