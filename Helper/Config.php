<?php

namespace TheITNerd\Performance\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\ObjectManager;
use Magento\Store\Model\ScopeInterface;
use TheITNerd\Core\Api\Adapters\PostcodeClientInterface;

/**
 * Class Config
 * @package TheITNerd\Performance\Helper
 */
class Config extends AbstractHelper
{
    public const PERFORMANCE_GENERAL_ENABLED_CONFIG_PATH = "performance/general/enabled";
    public const PERFORMANCE_GENERAL_ADDITIONAL_PRECONNECT_CONFIG_PATH = "performance/general/additional_preconnect";

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool)$this->scopeConfig->getValue(self::PERFORMANCE_GENERAL_ENABLED_CONFIG_PATH, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return array
     */
    public function getAdditionalPreconnect(): array
    {
        $entries = $this->scopeConfig->getValue(self::PERFORMANCE_GENERAL_ADDITIONAL_PRECONNECT_CONFIG_PATH, ScopeInterface::SCOPE_STORE);

        if(empty($entries)) {
            return [];
        }

        return explode("\n", $entries);
    }

}
