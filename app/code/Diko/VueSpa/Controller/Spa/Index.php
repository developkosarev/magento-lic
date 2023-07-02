<?php

declare(strict_types=1);

namespace Diko\VueSpa\Controller\Spa;

use Diko\VueSpa\Service\OptionsFactoryInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

//https://magento-lic.local/vuespa/spa/index
class Index implements HttpGetActionInterface, \Magento\Csp\Api\CspAwareActionInterface
{
    private PageFactory $pageFactory;
    private OptionsFactoryInterface $optionsFactory;

    public function __construct(PageFactory $pageFactory, OptionsFactoryInterface $optionsFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->optionsFactory = $optionsFactory;
    }

    public function execute(): Page
    {
        $option = $this->optionsFactory->create(1);
        //echo "<pre>";
        //var_dump($this->optionsFactory);
        //var_dump($option);
        //echo "</pre>";

        //echo "<pre>";
        //var_dump($_REQUEST);
        //var_dump($_SERVER);
        //var_dump($GLOBALS);
        //echo "</pre>";

        return $this->pageFactory->create();
    }

    public function modifyCsp(array $appliedPolicies): array
    {
        $appliedPolicies[] = new \Magento\Csp\Model\Policy\FetchPolicy(
            'form-action',
            false,
            ['http://minio.local:81'],
            ['http']
        );

        return $appliedPolicies;
    }
}
