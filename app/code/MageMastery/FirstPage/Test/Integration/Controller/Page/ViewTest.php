<?php

declare(strict_types=1);

namespace MageMastery\FirstPage\Test\Integration\Controller\Page;

use Laminas\Http\Response;
use Magento\Framework\App\Request\Http as HttpRequest;

/**
 * First page view controller test
 */
class ViewTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * Test contacting.
     */
    public function testGetAction()
    {
        $this->getRequest()->setMethod(HttpRequest::METHOD_GET);

        $this->dispatch('magemastery/page/view');
        $this->assertEquals(Response::STATUS_CODE_200, $this->getResponse()->getStatusCode());

        $expectedJson = '{"message":"My First Page"}';
        $this->assertJsonStringEqualsJsonString($expectedJson, $this->getResponse()->getContent());
    }
}
