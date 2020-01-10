<?php
/**
 * @author denis303 <dev@denis303.com>
 * @license MIT
 * @link http://denis303.com
 */
namespace Denis303\Auth;

interface UserServiceInterface
{
    
    public function setUserId($id, bool $rememberMe = true);

    public function getUserId();

    public function unsetUserId();

}