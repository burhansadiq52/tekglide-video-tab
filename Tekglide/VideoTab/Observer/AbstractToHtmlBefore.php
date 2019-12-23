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

namespace Tekglide\VideoTab\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AbstractToHtmlBefore implements ObserverInterface
{
    /**
     * Helper object
     *
     * @var \Tekglide\VideoTab\Helper\Data
     */
    protected $helper;

    /**
     * @param \Tekglide\VideoTab\Helper\Data $helper
     */
    public function __construct(\Tekglide\VideoTab\Helper\Data $helper)
    {
        $this->helper = $helper;
    }

    /**
     * Remove video.tab block from detailed_info group
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if ($observer->getBlock() instanceof \Tekglide\VideoTab\Block\View) {

            $block = $observer->getBlock();
            $product = $block->getProduct();

            if (!$this->helper->isVideotabAttributeEnabled($product)) {
                $block->setTemplate(false);
            }
        }
    }
}
