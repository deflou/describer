<?php
namespace deflou\interfaces\services\options;

/**
 * Interface IServiceOptionDescribed
 *
 * @package deflou\interfaces\services\options
 * @author deflou.dev@gmail.com
 */
interface IServiceOptionDescribed extends IServiceOption
{
    const VALUE = 'value';

    /**
     * @return string
     */
    public function getValue(): string;

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value);
}
