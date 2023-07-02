<?php
declare(strict_types=1);

namespace Diko\Newsletter\Block\Adminhtml\Edit\Tab;

use Magento\Customer\Block\Adminhtml\Edit\Tab\Newsletter as BaseNewsletter;

class Newsletter extends BaseNewsletter
{
    protected $_template = 'Diko_Newsletter::tab/newsletter.phtml';
}
