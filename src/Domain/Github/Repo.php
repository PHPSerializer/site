<?php

namespace NilPortugues\PhpSerializer\Domain\Github;

class Repo
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $updatedAt;
    /**
     * @var string
     */
    private $gitRepoUrl;
    /**
     * @var string
     */
    private $svnRepoUrl;

    /**
     * @param string $name
     * @param string $gitRepoUrl
     * @param string $svnRepoUrl
     * @param string $updatedAt
     */
    public function __construct($name, $gitRepoUrl, $svnRepoUrl, $updatedAt)
    {
        $this->setName($name);
        $this->setGitRepoUrl($gitRepoUrl);
        $this->setSvnRepoUrl($svnRepoUrl);
        $this->setUpdatedAt($updatedAt);
    }

    /**
     * @param mixed $name
     * @return $this
     */
    private function setName($name)
    {
        $this->name = (string) $name;
    }

    /**
     * @param mixed $gitRepoUrl
     * @return $this
     */
    private function setGitRepoUrl($gitRepoUrl)
    {
        $this->gitRepoUrl = (string) $gitRepoUrl;
    }

    /**
     * @param mixed $svnRepoUrl
     * @return $this
     */
    private function setSvnRepoUrl($svnRepoUrl)
    {
        $this->svnRepoUrl = (string) $svnRepoUrl;
    }

    /**
     * @param mixed $updatedAt
     * @return $this
     */
    private function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = (string) $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function updatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return mixed
     */
    public function gitRepoUrl()
    {
        return $this->gitRepoUrl;
    }

    /**
     * @return mixed
     */
    public function svnRepoUrl()
    {
        return $this->svnRepoUrl;
    }
}
