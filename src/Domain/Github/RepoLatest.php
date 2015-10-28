<?php

namespace NilPortugues\PhpSerializer\Domain\Github;

class RepoLatest
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $publishedAt;
    /**
     * @var string
     */
    private $tarball;
    /**
     * @var string
     */
    private $zipfile;

    /**
     * @param $name
     * @param $tarball
     * @param $zipfile
     * @param $publishedAt
     */
    public function __construct($name, $tarball, $zipfile, $publishedAt)
    {
        $this->setName($name);
        $this->setTarBall($tarball);
        $this->setZipFile($zipfile);
        $this->setPublishedAt($publishedAt);
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
     * @param mixed $tarball
     * @return $this
     */
    private function setTarBall($tarball)
    {
        $this->tarball = (string) $tarball;
    }

    /**
     * @param mixed $zipfile
     * @return $this
     */
    private function setZipFile($zipfile)
    {
        $this->zipfile = (string) $zipfile;
    }

    /**
     * @param mixed $publishedAt
     * @return $this
     */
    private function setPublishedAt($publishedAt)
    {
        $this->publishedAt = (string) $publishedAt;
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
        return $this->publishedAt;
    }

    /**
     * @return mixed
     */
    public function gitRepoUrl()
    {
        return $this->tarball;
    }

    /**
     * @return mixed
     */
    public function svnRepoUrl()
    {
        return $this->zipfile;
    }
}
