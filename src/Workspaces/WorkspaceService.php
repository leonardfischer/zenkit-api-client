<?php

namespace idoit\zenkit\Workspaces;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\API;
use idoit\zenkit\BadResponseException;

/**
 * Class WorkspaceService
 * @package idoit\zenkit\Workspaces
 */
class WorkspaceService extends API
{
    /**
     * @param int|string $workspaceAllId
     * @return object|WorkspaceItem
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function getWorkspace($workspaceAllId)
    {
        $response = $this->request("workspaces/{$workspaceAllId}");

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
     * @todo
     */
    private function getUsersForWorkspaces()
    {
    }

    /**
     * @return object|WorkspaceItem[]
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     * @throws BadResponseException
     */
    public function getAllWorkspacesAndLists()
    {
        $response = $this->request('users/me/workspacesWithLists');

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
