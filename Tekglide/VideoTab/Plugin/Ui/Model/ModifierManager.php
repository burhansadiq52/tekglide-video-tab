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

namespace Tekglide\VideoTab\Plugin\Ui\Model;

use Magento\Ui\Model\Manager as ExtendedClass;
use Closure;

class ModifierManager
{
    /**
     * @var int
     */
    const MODULE_ENABLED = 1;

    /*
     *@var \Magento\Framework\Module\Output\Config
     */
    protected $config;

    /**
     * @param \Magento\Framework\Module\Output\Config $config
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\Module\Output\Config $config,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->config = $config;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Unset VideoTab if Tekglide_video_tab/general/module_enabled
     * @param ExtendedClass $subject
     * @param Closure $proceed
     * @param string $name
     * @return array
     */
    public function aroundGetData(
        ExtendedClass $subject,
        Closure $proceed,
        $name
    ) {
        if ($name == "product_form") {
            $moduleStatus = $this->scopeConfig->getValue(
                'Tekglide_video_tab/general/module_enabled',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
            $bundleComponents = $proceed($name);
            if (isset($bundleComponents[$name]['children']['video']) && $moduleStatus != self::MODULE_ENABLED) {
                unset($bundleComponents[$name]['children']['video']);
            }
        } else {
            $bundleComponents = $proceed($name);
        }
        return $bundleComponents;
    }
}
