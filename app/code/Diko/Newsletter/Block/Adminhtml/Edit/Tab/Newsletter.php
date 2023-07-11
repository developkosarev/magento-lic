<?php
declare(strict_types=1);

namespace Diko\Newsletter\Block\Adminhtml\Edit\Tab;

use Magento\Customer\Block\Adminhtml\Edit\Tab\Newsletter as BaseNewsletter;

class Newsletter extends BaseNewsletter
{
    protected $_template = 'Diko_Newsletter::tab/newsletter.phtml';

    public function initForm()
    {
        parent::initForm();

        $websiteId = 1;

        $fieldset = $this->_form->addFieldset(
            'base_fieldset_1',
            [
                'legend' => __('Newsletter Information2'),
                'class' => 'customer-newsletter-fieldset',
            ]
        );

        $fieldset->addField(
            'subscription_test_' . $websiteId,
            'select',
            [
                'label' => __('Subscribed on Store View'),
                'name' => "subscription_test[$websiteId]",
                'data-form-part' => $this->getData('target_form'),
                'values' => [1 => 'first', '2' => 'second'],
                'value' => 2,
            ]
        );

        return $this;
    }
}
