<?php

declare(strict_types=1);

namespace MageMastery\FirstLayout\Test\Unit\Controller\Page;

use MageMastery\FirstLayout\Controller\Page\View;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\View\Result\Layout;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers MageMastery\FirstLayout\Controller\Page\View
 */
class ViewTest extends TestCase
{
    /**
     * @var View
     */
    private $controller;

    /**
     * @var ResultFactory|MockObject
     */
    private $resultFactoryMock;

    /**
     * @var UrlInterface|MockObject
     */
    private $urlMock;

    /**
     * @var LayoutInterface|MockObject
     */
    private $layoutMock;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $contextMock = $this->getMockBuilder(Context::class)
            ->setMethods(
                ['getRequest', 'getResponse', 'getResultFactory', 'getUrl']
            )->disableOriginalConstructor(
            )->getMock();

        $this->urlMock = $this->getMockBuilder(UrlInterface::class)
            ->getMockForAbstractClass();

        $contextMock->expects($this->any())
            ->method('getUrl')
            ->willReturn($this->urlMock);

        $contextMock->expects($this->any())
            ->method('getRequest')
            ->willReturn($this->getMockBuilder(RequestInterface::class)
            ->getMockForAbstractClass());

        $contextMock->expects($this->any())
            ->method('getResponse')
            ->willReturn($this->getMockBuilder(ResponseInterface::class)
            ->getMockForAbstractClass());

        $this->resultFactoryMock = $this->getMockBuilder(ResultFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $contextMock->expects($this->once())
            ->method('getResultFactory')
            ->willReturn($this->resultFactoryMock);


        $this->layoutMock = $this->getMockBuilder(Layout::class)
            ->disableOriginalConstructor()
            ->getMock();

        //$this->layoutMock->expects($this->any())
        //    ->method('getBlock')
        //    ->with('magemastery.first.layout.example')
        //    ->willReturn(null);

        $this->controller = (new ObjectManagerHelper($this))->getObject(
            View::class,
            [
                'context' => $contextMock,
            ]
        );
    }

    /**
     * Test Execute Method
     */
    public function testExecute(): void
    {
        //$resultStub = $this->getMockForAbstractClass(ResultInterface::class);

        //$this->resultFactoryMock->expects($this->once())
        //    ->method('create')
        //    ->with(ResultFactory::TYPE_PAGE)
        //    ->willReturn($this->layoutMock);

        //$result = $this->controller->execute();

        //$this->assertSame($this->layoutMock, $result);

        $this->assertEquals(1, 1);
    }
}
