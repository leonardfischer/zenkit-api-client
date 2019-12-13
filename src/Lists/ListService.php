<?php

namespace idoit\zenkit\Lists;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\API;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ListService
 * @package idoit\zenkit\Lists
 */
class ListService extends API
{
    /**
     * @param string $listShortId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getList(string $listShortId): ResponseInterface
    {
        return $this->request("lists/{$listShortId}");
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
    private function getListsWithoutWorkspaceAccess()
    {
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
