<?php
/**
 * @author denis303 <dev@denis303.com>
 * @license MIT
 * @link http://denis303.com
 */
namespace Denis303\Auth;

use Config\Services;

class AuthSession
{

    public $name;

    protected $_session;

    public function __construct(string $name)
    {
        $this->name = $name;

        $this->_session = Services::session();
    }

    public function getAuthId()
    {
        return $this->_session->get($this->name);
    }

    public function setAuthId($auth)
    {
        $this->_session->set($this->name, $auth);
    }

    public function unsetAuthId()
    {
        $this->_session->remove($this->name);
    }

}