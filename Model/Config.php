<?php

declare(strict_types=1);

namespace Commerce365\CustomerPrice\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    private const XML_PATH_HIDE_PRICES = 'commerce365config_general/b2b_pricing/hide_prices_guest';
    public const XML_PATH_AJAX_ENABLED = 'commerce365config_general/b2b_pricing/ajax_enabled';
    private const XML_PATH_CACHE_HOURS = 'commerce365config_general/b2b_pricing/cache_hours';
    public const XML_PATH_SPECIAL_PRICE = 'commerce365config_general/b2b_pricing/use_special_price';
    private const XML_PATH_CACHE_ENABLE = 'commerce365config_general/b2b_pricing/db_caching_enabled';
    private const XML_PATH_SHOW_UOM = 'commerce365config_general/b2b_pricing/show_priceperuom';

    private ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return bool
     */
    public function isAjaxEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_AJAX_ENABLED);
    }

    /**
     * @return bool
     */
    public function isCachingEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_CACHE_ENABLE);
    }

    /**
     * @return bool
     */
    public function isHidePricesGuest(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_HIDE_PRICES);
    }

    /**
     * @return bool
     */
    public function useSpecialPrice(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_SPECIAL_PRICE);
    }

    public function getCacheHours()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_CACHE_HOURS);
    }

    public function showPricePerUom()
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_SHOW_UOM);
    }
}
