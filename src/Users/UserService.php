<?php

namespace idoit\zenkit\Users;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\AbstractService;
use idoit\zenkit\DataTypes\UserItem;
use JsonMapper_Exception;

/**
 * Class UserService
 *
 * @package idoit\zenkit\Users
 */
class UserService extends AbstractService
{
    /**
     * @return object|UserItem
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function getCurrentUser()
    {
        $response = $this->api->request('users/me');

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->map($rawData, new UserItem());
    }
}
