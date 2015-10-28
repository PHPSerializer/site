<?php

namespace NilPortugues\PhpSerializer\Application\Query;

use NilPortugues\PhpSerializer\Domain\Github\RepoId;
use NilPortugues\PhpSerializer\Domain\Github\Repository;

class LatestProjectReleasesQueryHandler
{
    /**
     * @var Repository
     */
    private $repoRepository;

    /**
     * @param Repository $repoRepository
     */
    public function __construct(Repository $repoRepository)
    {
        $this->repoRepository = $repoRepository;
    }
    /**
     * @param LatestProjectReleasesQuery $query
     * @return \NilPortugues\PhpSerializer\Domain\Github\RepoLatest[]
     */
    public function handle(LatestProjectReleasesQuery $query)
    {
        $repositories = [];
        foreach($query->repositories() as $repository) {
            $repositories[] = RepoId::fromString($repository);
        }

        return $this->repoRepository->findLatestReleases($repositories);
    }
}