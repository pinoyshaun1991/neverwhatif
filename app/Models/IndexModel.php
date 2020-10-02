<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class IndexModel extends Model
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $message;

    /**
     * IndexModel constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->name    = '';
        $this->email   = '';
        $this->message = '';
    }

    /**
     * Sets the name
     *
     * @param $name
     * @return string
     * @throws Exception
     */
    public function setName($name): string
    {
        if (empty($name)) {
            throw new Exception('Name field is required');
        }

        return $this->name = $name;
    }

    /**
     * Retrieve name value
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the email
     *
     * @param $email
     * @return string
     * @throws Exception
     */
    public function setEmail($email): string
    {
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Email field is required or invalid');
        }

        return $this->email = $email;
    }

    /**
     * Retrieve email value
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Sets the message
     *
     * @param $message
     * @return string
     * @throws Exception
     */
    public function setMessage($message): string
    {
        if (empty($message)) {
            throw new Exception('Message field is required');
        }

        return $this->message = $message;
    }

    /**
     * Retrieve message value
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Saves the message
     *
     * @param array $params
     * @return bool
     * @throws Exception
     */
    public function saveMessage($params = array())
    {
        $this->setName($params['name']);
        $this->setEmail($params['email']);
        $this->setMessage($params['message']);

        DB::table('messages')->insert(
            array(
                'name'    => $this->getName(),
                'email'   => $this->getEmail(),
                'message' => $this->getMessage()
            )
        );

        return true;
    }
}
