<?php
namespace deflou\components\services\options;

use deflou\interfaces\services\options\IServiceOptionConfigured;

/**
 * Class ServiceOptionConfigured
 *
 * @package deflou\components\services\options
 * @author deflou.dev@gmail.com
 */
class ServiceOptionConfigured extends ServiceOptionAbstract implements IServiceOptionConfigured
{
    /**
     * @param string $value
     *
     * @return ServiceOptionDescribed
     */
    public function describe($value = '')
    {
        $described = new ServiceOptionDescribed($this->__toArray());
        $described->setValue($value);

        return $described;
    }
}
