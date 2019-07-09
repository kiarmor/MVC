<?php

namespace Model\Entity;


class Feedback
{
    private $email;
    private $message;

    public function __construct($email, $message)
    {
        $this->email = $email;
        $this->message= $message;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Feedback
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Feedback
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}