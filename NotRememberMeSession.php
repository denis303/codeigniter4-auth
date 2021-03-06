<?php
/**
 * @author denis303 <dev@denis303.com>
 * @license MIT
 * @link http://denis303.com
 */
namespace Denis303\Auth;

use Config\Services;

class NotRememberMeSession
{

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }    

    public function getToken()
    {
        $session = Services::session();

        return $session->get($this->name);
    }

    public function setToken(string $token)
    {
        $session = Services::session();

        return $session->set($this->name, $token);
    }

    public function unsetToken()
    {
        $session = Services::session();

        return $session->remove($this->name);
    }

}