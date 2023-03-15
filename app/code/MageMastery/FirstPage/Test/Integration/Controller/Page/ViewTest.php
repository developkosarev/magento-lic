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
        //$this->getRequest()->setMethod(HttpRequest::METHOD_GET);

        $this->dispatch('magemastery/page/view');
        $result = $this->getResponse()->getBody();
        $this->assertEquals(Response::STATUS_CODE_200, $this->getResponse()->getStatusCode());
        //$this->assert404NotFound();

        $expectedJson = '{"message":"My First Page"}';
        $this->assertJsonStringEqualsJsonString($expectedJson, $this->getResponse()->getContent());

        var_dump($this->getRequest()->getControllerName());
        var_dump($result);

        var_dump($this->getResponse()->getContent());
    }

    public function testViewAction()
    {
        $this->dispatch('/enable-cookies');
        $this->assertStringContainsString('What are Cookies?', $this->getResponse()->getBody());

        var_dump($this->getResponse()->getContent());
    }

    public function testViewRedirectWithTrailingSlash()
    {
        $this->dispatch('/enable-cookies/');
        $code = $this->getResponse()->getStatusCode();
        $location = $this->getResponse()->getHeader('Location')->getFieldValue();

        $this->assertEquals(301, $code, 'Invalid response code');
        $this->assertStringEndsWith('/enable-cookies', $location, 'Invalid location header');
    }
}
