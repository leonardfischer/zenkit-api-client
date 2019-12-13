<?php

namespace synetics\zenkit\Lists;

use GuzzleHttp\Exception\GuzzleException;
use synetics\zenkit\API;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ListService
 * @package synetics\zenkit\Lists
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
    private function getUpdatedAtOfResources(): void
    {
    }

    /**
     * @todo
     */
    private function getUsersForList(): void
    {
    }

    /**
     * @todo
     */
    private function getListsWithoutWorkspaceAccess(): void
    {
    }

    /**
     * @todo
     */
    private function setMostRecentList(): void
    {
    }

    /**
     * @todo
     */
    private function editListProperties(): void
    {
    }

    /**
     * @todo
     */
    private function deprecateList(): void
    {
    }
}
