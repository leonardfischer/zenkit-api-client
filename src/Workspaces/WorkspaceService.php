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
     * @todo
     */
    private function getWorkspace()
    {
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
