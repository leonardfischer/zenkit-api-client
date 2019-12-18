# zenkit-api-client

A PHP API client library for Zenkit. In order to use the API you'll need to get a API key from Zenkit, you can read about that in the [Zenkit API documentation](https://zenkit.com/docs/api/overview/introduction).

Please note that a API key is always connected to a user, so you might want to create a 'system' user with access to all your workspaces if you plan to develop an application that needs to process data you might not be allowed to see.

## Testing the connection

In order to test your connection you can simply call information about your user:

```php
$apiKey = 'your-api-key';

try {
    // Get the response from Guzzle.
    $response = (new API($apiKey))->request('auth/currentuser');

    // Get the body contents of the response.
    $rawResponseBody = $response->getBody()->getContents();

    // Output data as array.
    var_dump(json_decode($rawResponseBody, true));
} catch (idoit\zenkit\BadResponseException $e) {
    echo 'Exception! The status was ' . $e->getCode() . ', response: ' . $e->getResponse()->getBody()->getContents();
} catch (Exception $e) {
    echo 'Exception! Somewthing else went wrong: ' . $e->getMessage();
}
```

If you see an array with information about your user it was a success - you should see data like your user ID, short ID, UUID, initials, full name, your recent lists and a lot of other things.  

# Good to know

## Naming 

In the API context some components have other names, for example "Collections" are called "Lists" and "Fields" are called "Elements".

For this please also refer to the [API documentation](https://zenkit.com/docs/api/overview/naming-convention).

## Mapped / raw responses

By default your responses will be 'mapped' to class instances. This means that all data ('Elements', 'Entries', 'Lists', ...) will be mapped to according `*Item` class instances (`ElementItem`, `EntryItem`, `ListItem`, ...).

Retrieving objects will help you work with Zenkit data regarding code completion and look inside the class what data (and data types!) you will receive from Zenkit.

If -however- you prefer handling raw data instead of mapped objects you have two options:

- You can directly use the `$api->request()` Method and work with the Guzzle response object
- You can switch the API to deliver raw data when using the service classes via `setRawOutput` method

## Entry / element definition

In order to map "elements" to entries and read their content you will need to load elements first and pass them to the entry service, like this:

```php
$listShortId = 'your-list-short-id';

$elements = $api->getElementService()
    ->getElementsInList($listShortId);

$entries = $api->getEntryService()
    ->setElementConfiguration($elements)
    ->getEntriesForListView($listShortId);
```

Without the passed configuration you will not get mapped entry data - you will only be able to process the data if you retrieve 'raw' results.
