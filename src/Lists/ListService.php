<?php

namespace idoit\zenkit\Lists;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\AbstractService;
use idoit\zenkit\BadResponseException;
use idoit\zenkit\DataTypes\ListItem;
use JsonMapper_Exception;

/**
 * Class ListService
 *
 * @package idoit\zenkit\Lists
 */
class ListService extends AbstractService
{
    /**
     * @param string $listShortId
     * @return object|ListItem
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws JsonMapper_Exception
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
     * @return ListItem[]
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function getListsWithoutWorkspaceAccess(): array
    {
        $response = $this->api->request('users/me/lists-without-workspace-access');

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->mapArray($rawData, [], ListItem::class);
    }

    /**
     * @return void
     * @todo
     */
    private function getUpdatedAtOfResources(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function getUsersForList(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function setMostRecentList(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function editListProperties(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function deprecateList(): void
    {
    }
}
