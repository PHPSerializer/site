<?php

namespace NilPortugues\PhpSerializer\Domain\Github;

class RepoId
{
    /**
     * @var string
     */
    private $vendor;
    /**
     * @var string
     */
    private $repository;

    /**
     * @param $vendor
     * @param $repository
     */
    public function __construct($vendor, $repository)
    {
        $this->vendor = (string) $vendor;
        $this->repository = (string) $repository;
    }

    /**
     * @return mixed
     */
    public function vendor()
    {
        return $this->vendor;
    }

    /**
     * @return mixed
     */
    public function repository()
    {
        return $this->repository;
    }

    /**
     * @return string
     */
    public function repositoryPath()
    {
        return sprintf("%s/%s", $this->vendor, $this->repository);
    }

    /**
     * @param $string
     * @return static
     */
    public static function fromString($string)
    {
        list($vendor, $repository) = explode("/", $string);

        return new static($vendor, $repository);
    }
}
