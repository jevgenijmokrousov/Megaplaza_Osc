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

namespace Mageplaza\Osc\Model\System\Config\Source;

use Magento\Framework\Model\AbstractModel;

/**
 * Class Giftwrap
 * @package Mageplaza\Osc\Model\System\Config\Source
 */
class Giftwrap extends AbstractModel
{
    const PER_ORDER = 0;
    const PER_ITEM = 1;

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            self::PER_ORDER => __('Per Order'),
            self::PER_ITEM => __('Per Item')
        ];
    }
}