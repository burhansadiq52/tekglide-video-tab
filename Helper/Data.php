<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License v3 (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * @category Tekglide
 * @package Tekglide_VideoTab
 * @copyright  Copyright (c) 2016-2018 Tekglide, Inc. (http://www.Tekglide.com)
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License v3 (GPL 3.0)
 */

namespace Tekglide\VideoTab\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Check product video parameters enabled/disabled
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return bool
     */
    public function isVideotabAttributeEnabled($product)
    {
        return ($product->getTekglideVideoEnabled() && $product->getTekglideVideoEmbedcode());

    }
}
