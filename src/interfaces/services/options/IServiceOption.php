<?php
namespace deflou\interfaces\services\options;

use deflou\interfaces\ICanBeDescribed;

/**
 * Interface IServiceOption
 *
 * @package deflou\interfaces\services\options
 * @author aivanov@fix.ru
 */
interface IServiceOption extends ICanBeDescribed
{
    /**
     * @return array
     */
    public function __toArray(): array;
}
