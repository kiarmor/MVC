<?php

namespace Model\Repository;

use Model\Entity\User;

class UserRepository
{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function setPdo(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByEmail($email)
    {
          $sql = 'SELECT * FROM user WHERE email = :email limit 1';
          $sth = $this->pdo->prepare($sql);
          $sth->execute([
              'email' => $email
          ]);

          $res = $sth->fetch(\PDO::FETCH_ASSOC);

          if (!$res){
              return null;
          }

          $user = (new User($res['email']))
              ->setPassword($res['password'])
          ;

          return $user;
    }
}