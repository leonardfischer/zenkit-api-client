<?php

namespace idoit\zenkit\Lists;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\AbstractService;
use idoit\zenkit\BadResponseException;

/**
 * Class ListService
 * @package idoit\zenkit\Lists
 */
class ListService extends AbstractService
{
    /**
     * @param string $listShortId
     * @return object|ListItem
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function getList(string $listShortId)
    {
        $response = $this->api->request("lists/{$listShortId}");

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->map($rawData, new ListItem());
    }

    /**
     * @todo
     */
    private function getUpdatedAtOfResources()
    {
    }

    /**
     * @todo
     */
    private function getUsersForList()
    {
    }

    /**
     * @todo
     */
    public function getListsWithoutWorkspaceAccess()
    {
        return $this->api->request('users/me/lists-without-workspace-access');
    }

    /**
     * @todo
     */
    private function setMostRecentList()
    {
    }

    /**
     * @todo
     */
    private function editListProperties()
    {
    }

    /**
     * @todo
     */
    private function deprecateList()
    {
    }
}
