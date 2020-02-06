<?php

namespace Kodbruket\RedisFallback\Session;

use Magento\Framework\Session\SaveHandlerFactory;
use Magento\Framework\Session\Config\ConfigInterface;
use Magento\Framework\Exception\SessionException;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class SaveHandler extends \Magento\Framework\Session\SaveHandler
{
    const REDIS_FALLBACK_HANDLER_CONFIG_XML = 'system/redis_fallback/handler';

    /**
     * Constructor
     *
     * @param SaveHandlerFactory $saveHandlerFactory
     * @param ConfigInterface $sessionConfig
     * @param string $default
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        SaveHandlerFactory $saveHandlerFactory,
        ConfigInterface $sessionConfig,
        $default = self::DEFAULT_HANDLER,
        ScopeConfigInterface $scopeConfig
    ) {
        $fallbackHandler = $scopeConfig->getValue(self::REDIS_FALLBACK_HANDLER_CONFIG_XML, ScopeInterface::SCOPE_STORE);
        if($fallbackHandler){
            $default = $fallbackHandler;
        }

        parent::__construct( $saveHandlerFactory, $sessionConfig, $default);
    }
}
