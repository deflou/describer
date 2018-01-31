<?php
namespace deflou\components\services\options;

use deflou\interfaces\services\options\IServiceOptionDescribed;

/**
 * Class ServiceOptionDescribed
 *
 * @package deflou\components\services\options
 * @author deflou.dev@gmail.com
 */
class ServiceOptionDescribed extends ServiceOptionAbstract implements IServiceOptionDescribed
{
    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->option[static::VALUE] ?? '';
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->option[static::VALUE] = (string) $value;

        return $this;
    }

    /**
     * @return string
     */
    public function describe()
    {
        return $this->getName();
    }
}
