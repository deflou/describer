<?php
namespace deflou\components\services\authors;

use deflou\interfaces\services\authors\IServiceAuthor;

/**
 * Class ServiceAuthorAbstract
 *
 * @package deflou\components\services\authors
 * @author deflou.dev@gmail.com
 */
class ServiceAuthorAbstract implements IServiceAuthor
{
    /**
     * @var array
     */
    protected $authorInfo = [];

    /**
     * ServiceAuthorAbstract constructor.
     * @param array $authorInfo
     */
    public function __construct(array $authorInfo)
    {
        $this->authorInfo = $authorInfo;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->authorInfo[static::OPTION__NAME] ?? '';
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->authorInfo[static::OPTION__EMAIL] ?? '';
    }

    /**
     * @return string
     */
    public function getSiteUrl(): string
    {
        return $this->authorInfo[static::OPTION__SITE_URL] ?? '';
    }
}
