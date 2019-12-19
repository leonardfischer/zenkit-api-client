<?php

namespace idoit\zenkit\Workspaces;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\AbstractService;
use idoit\zenkit\BadResponseException;
use idoit\zenkit\DataTypes\UserItem;
use idoit\zenkit\DataTypes\WorkspaceItem;
use JsonMapper_Exception;

/**
 * Class WorkspaceService
 * @package idoit\zenkit\Workspaces
 */
class WorkspaceService extends AbstractService
{
    /**
     * @param int|string $workspaceAllId
     * @return object|WorkspaceItem
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function getWorkspace($workspaceAllId)
    {
        $response = $this->api->request("workspaces/{$workspaceAllId}");

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->map($rawData, new WorkspaceItem());
    }

    /**
     * @todo
     */
    private function getUpdatedAtOfResources()
    {
    }

    /**
     * @param int $workspaceId
     * @return object|UserItem[]
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function getUsersForWorkspaces(int $workspaceId)
    {
        $response = $this->api->request("workspaces/{$workspaceId}/users");

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->mapArray($rawData, [], UserItem::class);
    }

    /**
     * @return object|WorkspaceItem[]
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     * @throws BadResponseException
     */
    public function getAllWorkspacesAndLists()
    {
        $response = $this->api->request('users/me/workspacesWithLists');

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->mapArray($rawData, [], WorkspaceItem::class);
    }

    /**
     * @todo
     */
    private function createWorkspace()
    {
    }

    /**
     * @todo
     */
    private function updateWorkspaceDetails()
    {
    }

    /**
     * @todo
     */
    private function deprecateWorkspace()
    {
    }
}
