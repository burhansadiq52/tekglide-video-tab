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

namespace Tekglide\VideoTab\Plugin\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\Eav as ExtendClass;
use Closure;
use Magento\Framework\App\RequestInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;

class ModifierEav extends \Magento\Framework\View\Element\Template
{
    /**
     * @var int
     */
    const MODULE_ENABLED = 1;

    protected $_coreRegistry = null;

    /**
     *@var \Magento\Framework\Module\Output\Config
     */
    protected $config;

    /**
     * @param \Magento\Framework\Module\Output\Config $config
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        Registry $registry,
        \Magento\Framework\Module\Output\Config $config,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->_coreRegistry    = $registry;
        $this->config = $config;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * Delete VideoTab metadata if module disabled in Advanced/Advanced/Disable Modules Output
     *
     * @param ExtendClass $subject
     * @param Closure $proceed
     * @param array $meta
     *
     * @return array
     */
    public function aroundModifyMeta(
        ExtendClass $subject,
        Closure $proceed,
        array $meta
    ) {
        $moduleStatus = $this->scopeConfig->getValue(
            'Tekglide_video_tab/general/module_enabled',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        $meta = $proceed($meta);
        
        if ($moduleStatus != self::MODULE_ENABLED) {
            $meta["video"] = [
                "arguments" => [
                    "data" => [
                        "config" => [
                            "componentType" => "fieldset",
                            "label" => "",
                            "collapsible" => false,
                            'opened' => false,
                            'canShow' => false,
                            'visible' => false
                        ]
                    ]
                ]
            ];
        }
        return $meta;
    }
}
