<?php
/**
 * Used in creating options for Redis Fallback Handler config value selection
 */
namespace Kodbruket\RedisFallback\Model\System\Config;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class RedisHandler
 */
class RedisHandler implements ArrayInterface
{
    const FILES = 'files';
    const DATABASE = 'db';

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => self::FILES,
                'label' => __('Files')
            ],
            [
                'value' => self::DATABASE,
                'label' => __('Database')
            ]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            self::FILES => __('Files'),
            self::DATABASE => __('Database')
        ];
    }
}
