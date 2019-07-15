<?php

namespace Framework;

class RepositoryFactory
{
    private $repositories = [];

    private $pdo;

    public function setPdo(\PDO $pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }

    /**
     * This method returns 'Book | Author | Category ...' Repository class
     */
    public function createRepository($entityName)
    {
        if (isset($this->repositories[$entityName])) {
            //echo 'Repo exist -> returning';
            return $this->repositories[$entityName];
        }

        $classname = "\\Model\Repository\\{$entityName}Repository";

        //todo: might check if file with repo exist
        //echo 'creating repo'
        $repo = new $classname();
        $repo->setPdo($this->pdo);
        $this->repositories[$entityName] = $repo;

        return $repo;
    }
}