<?php

declare(strict_types=1);

namespace MageMastery\FirstLayout\Test\Integration\Controller\Page;

use Laminas\Http\Response;
use Magento\Framework\App\Request\Http as HttpRequest;

/**
 * First page view controller test
 */
class ViewTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * Test first page.
     */
    public function testGetAction()
    {
        $this->getRequest()->setMethod(HttpRequest::METHOD_GET);

        $this->dispatch('firstlayout/page/view');
        $this->assertEquals(Response::STATUS_CODE_200, $this->getResponse()->getStatusCode());
        //$this->assertStringContainsString(
        //    '<h1>My First Template</h1>',
        //    $this->getResponse()->getBody()
        //);
    }
}
