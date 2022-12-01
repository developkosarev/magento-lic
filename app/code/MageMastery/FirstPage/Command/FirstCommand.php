<?php

declare(strict_types=1);

namespace MageMastery\FirstPage\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Catalog\Model\ResourceModel\Category\Collection;

class FirstCommand extends Command
{
    private const NAME = 'name';

    /**
     * @var StoreManagerInterface
     */
    private StoreManagerInterface $storeManager;

    private CategoryFactory $categoryFactory;

    private CollectionFactory $categoryCollectionFactory;

    /**
     * @param StoreManagerInterface $storeManager
     * @param CategoryFactory $categoryFactory
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        CategoryFactory $categoryFactory,
        CollectionFactory $categoryCollectionFactory
    ) {
        parent::__construct();
        $this->storeManager = $storeManager;
        $this->categoryFactory = $categoryFactory;
        $this->categoryCollectionFactory = $categoryCollectionFactory;
    }

    protected function configure(): void
    {
        $this->setName('my:first:command');
        $this->setDescription('This is my first console command.');
        $this->addOption(self::NAME, null, InputOption::VALUE_REQUIRED, 'Name');

        parent::configure();
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $exitCode = 0;

        if ($name = $input->getOption(self::NAME)) {
            $output->writeln('<info>Provided name is `' . $name . '`</info>');
        }

        $output->writeln('<info>Success message.</info>');
        $output->writeln('<comment>Some comment.</comment>');

        // get the current stores root category
        $parentId = $this->storeManager->getStore()->getRootCategoryId();
        $parentCategory = $this->categoryFactory->create()->load($parentId);

        $categoryName = 'Wine';

        //$category = $this->categoryFactory->create();
        //$cate = $category->getCollection()
        //    ->addAttributeToFilter('name', $categoryName)
        //    ->getFirstItem();

        $category = $this->categoryCollectionFactory->create();
        $cate = $category
            ->addAttributeToFilter('name', $categoryName)
            //->load(true)
            ->getFirstItem();

        if (!$cate->getId()) {
            $category->setPath($parentCategory->getPath())
                ->setParentId($parentId)
                ->setName($categoryName)
                ->setIsActive(true);
            $category->save();
        }

        $output->writeln("<info>Root category id is `{$parentId}`</info>");

        return $exitCode;
    }
}
