<?php

declare(strict_types=1);

namespace TheITNerd\Performance\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Config
 * @package TheITNerd\Performance\Helper
 */
class Config extends AbstractHelper
{
    public const PERFORMANCE_GENERAL_ENABLED_CONFIG_PATH = "performance/general/enabled";
    public const PERFORMANCE_GENERAL_ADDITIONAL_PRECONNECT_CONFIG_PATH = "performance/general/additional_preconnect";

    public const PERFORMANCE_SERVER_PUSH_ADDITIONAL_IMAGE_CONFIG_PATH = "performance/server_push/additional_image";
    public const PERFORMANCE_SERVER_PUSH_ADDITIONAL_SCRIPT_CONFIG_PATH = "performance/server_push/additional_script";
    public const PERFORMANCE_SERVER_PUSH_ADDITIONAL_STYLE_CONFIG_PATH = "performance/server_push/additional_style";
    public const PERFORMANCE_SERVER_PUSH_ADDITIONAL_FONT_CONFIG_PATH = "performance/server_push/additional_font";


    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::PERFORMANCE_GENERAL_ENABLED_CONFIG_PATH, ScopeInterface::SCOPE_STORE);
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

    /**
     * @return array
     */
    public function getServerPushLinks(): array
    {
        $pushLinks = [
            'image' => explode("\n", $this->scopeConfig->getValue(self::PERFORMANCE_SERVER_PUSH_ADDITIONAL_IMAGE_CONFIG_PATH, ScopeInterface::SCOPE_STORE) ?? ''),
            'script' => explode("\n", $this->scopeConfig->getValue(self::PERFORMANCE_SERVER_PUSH_ADDITIONAL_SCRIPT_CONFIG_PATH, ScopeInterface::SCOPE_STORE) ?? ''),
            'style' => explode("\n", $this->scopeConfig->getValue(self::PERFORMANCE_SERVER_PUSH_ADDITIONAL_STYLE_CONFIG_PATH, ScopeInterface::SCOPE_STORE) ?? ''),
            'font' => explode("\n", $this->scopeConfig->getValue(self::PERFORMANCE_SERVER_PUSH_ADDITIONAL_FONT_CONFIG_PATH, ScopeInterface::SCOPE_STORE) ?? '')
        ];

        foreach($pushLinks as &$links) {
            foreach($links as $id => &$link) {
                $link = trim($link);

                if(empty($link)) {
                    unset($links[$id]);
                }
            }
        }

        return $pushLinks;
    }

}
