<?php
/**
 * @author denis303 <dev@denis303.com>
 * @license MIT
 * @link http://denis303.com
 */
namespace Denis303\Auth;

class UserService
{

    const NOT_REMEMBER_SUFFIX = '_not_remember';

    public $name;

    protected $_notRememberMe;

    protected $_auth;

    public function __construct(string $name)
    {
        $this->name = $name;

        $this->_auth = new AuthSession($name);

        $this->_notRememberMe = new NotRememberMe($name . static::NOT_REMEMBER_SUFFIX);
    }

    public function setUserId($id, bool $rememberMe = true)
    {
        $this->_auth->setAuthId($id);

        if ($rememberMe)
        {
            $this->_notRememberMe->deleteToken();
        }
        else
        {
            $token = $this->_notRememberMe->generateToken();

            $this->_notRememberMe->setToken($token);
        }
    }

    public function getUserId()
    {
        if (!$this->_notRememberMe->validateToken())
        {
            $this->logout();

            return null;
        }

        $return = $this->_auth->getAuthId();

        if (!$return)
        {
            $this->_notRememberMe->deleteToken();
        }

        return $return;
    }

    public function logout()
    {
        $this->_auth->deleteAuthId();

        $this->_notRememberMe->deleteToken();
    }

}