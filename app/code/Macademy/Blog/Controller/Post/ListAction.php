<?php declare(strict_types=1);

namespace Macademy\Blog\Controller\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

//https://magento-lic.local/blog
class ListAction implements HttpGetActionInterface
{
    public function __construct(
        private PageFactory $pageFactory
    )  {}

    public function execute(): Page
    {
        return $this->pageFactory->create();
    }
}
