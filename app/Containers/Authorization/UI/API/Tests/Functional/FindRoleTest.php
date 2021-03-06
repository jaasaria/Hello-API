<?php

namespace App\Containers\Authorization\UI\API\Tests\Functional;

use App\Containers\Authorization\Models\Role;
use App\Containers\Authorization\Tests\TestCase;

/**
 * Class FindRoleTest.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class FindRoleTest extends TestCase
{

    protected $endpoint = 'get@roles/{id}';

    protected $access = [
        'roles'       => 'admin',
        'permissions' => '',
    ];

    public function testFindRoleById_()
    {
        $roleA = factory(Role::class)->create();

        // send the HTTP request
        $response = $this->injectId($roleA->id)->makeCall();

        // assert response status is correct
        $this->assertEquals('200', $response->getStatusCode());

        $responseContent = $this->getResponseContent($response);

        $this->assertEquals($roleA->name, $responseContent->data->name);
    }

}
