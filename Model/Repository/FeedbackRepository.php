<?php

namespace Model\Repository;

use Model\Entity\Feedback;

class FeedbackRepository
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(Feedback $feedback)
    {

    }

}