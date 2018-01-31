<?php
namespace deflou\interfaces\services\options;

/**
 * Interface IServiceOptionConfigured
 *
 * @package deflou\interfaces\services\options
 * @author deflou.dev@gmail.com
 */
interface IServiceOptionConfigured extends IServiceOption
{
    /**
     * @param string $value
     *
     * @return IServiceOptionDescribed
     */
    public function describe($value = '');
}
