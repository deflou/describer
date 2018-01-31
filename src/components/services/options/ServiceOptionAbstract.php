<?php
namespace deflou\components\services\options;

use deflou\interfaces\services\options\IServiceOption;

/**
 * Class ServiceOptionAbstract
 *
 * @package deflou\components\services\options
 * @author deflou.dev@gmail.com
 */
abstract class ServiceOptionAbstract implements IServiceOption
{
    /**
     * @var array
     */
    protected $option = [];

    /**
     * ServiceOptionAbstract constructor.
     * @param array $option
     */
    public function __construct($option = [])
    {
        $this->option = $option;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->option[static::NAME] ?? '';
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->option[static::NAME] = (string) $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->option[static::TITLE] ?? '';
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->option[static::TITLE] = (string) $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->option[static::DESCRIPTION] ?? '';
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->option[static::DESCRIPTION] = (string) $description;

        return $this;
    }

    /**
     * @return array
     */
    public function __toArray(): array
    {
        return $this->option;
    }
}
