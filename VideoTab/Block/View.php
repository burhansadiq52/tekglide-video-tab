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

namespace Tekglide\VideoTab\Block;

class View extends \Magento\Catalog\Block\Product\AbstractProduct
{
    /**
     * Assembling <a> tag with link and link label
     *
     * @return string
     */
    public function getLinkHtml()
    {
        $product = $this->getProduct();
        $link = $product->getTekglideVideoLink();
        $linkLabel = $product->getTekglideVideoLabel();

        if (!$linkLabel) {
            $linkLabel = __('Click here for more info');
        }

        $link = '<a href="' . $link . '">' . $linkLabel . '</a>';
        return $link;
    }
}
