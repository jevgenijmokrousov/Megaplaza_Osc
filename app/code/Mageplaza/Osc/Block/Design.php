<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_Osc
 * @copyright   Copyright (c) Mageplaza (http://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\Osc\Block;

use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\View\Design\Theme\ThemeProviderInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Mageplaza\Osc\Helper\Data as OscHelper;

/**
 * Class Design
 * @package Mageplaza\Osc\Block
 */
class Design extends Template
{
    /**
     * @var OscHelper
     */
    protected $_oscHelper;

    /**
     * @var ThemeProviderInterface
     */
    protected $_themeProviderInterface;

    /**
     * @type \Magento\Checkout\Model\Session
     */
    private $checkoutSession;

    /**
     * Design constructor.
     * @param Context $context
     * @param OscHelper $oscHelper
     * @param ThemeProviderInterface $themeProviderInterface
     * @param CheckoutSession $checkoutSession
     * @param array $data
     */
    public function __construct(
        Context $context,
        OscHelper $oscHelper,
        ThemeProviderInterface $themeProviderInterface,
        CheckoutSession $checkoutSession,
        array $data = []
    )
    {
        parent::__construct($context, $data);

        $this->_oscHelper = $oscHelper;
        $this->_themeProviderInterface = $themeProviderInterface;
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * @return OscHelper
     */
    public function getHelperConfig()
    {
        return $this->_oscHelper;
    }

    /**
     * @return bool
     */
    public function isEnableGoogleApi()
    {
        return $this->getHelperConfig()->getAutoDetectedAddress() == 'google';
    }

    /**
     * @return mixed
     */
    public function getGoogleApiKey()
    {
        return $this->getHelperConfig()->getGoogleApiKey();
    }

    /**
     * @return array
     */
    public function getDesignConfiguration()
    {
        return $this->getHelperConfig()->getDesignConfig();
    }

    /**
     * @return string
     */
    public function getCurrentTheme()
    {
        return $this->_themeProviderInterface->getThemeById($this->getHelperConfig()->getCurrentThemeId())->getCode();
    }

    /**
     * @return bool
     */
    public function isVirtual()
    {
        return $this->checkoutSession->getQuote()->isVirtual();
    }
}