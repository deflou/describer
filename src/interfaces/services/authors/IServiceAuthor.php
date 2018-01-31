<?php
namespace deflou\interfaces\services\authors;

/**
 * Interface IServiceAuthor
 *
 * @package deflou\components\services
 * @author aivanov@fix.ru
 */
interface IServiceAuthor
{
    const OPTION__NAME = 'name';
    const OPTION__EMAIL = 'email';
    const OPTION__SITE_URL = 'url';

    /**
     * IServiceAuthor constructor.
     * @param array $authorInfo
     */
    public function __construct(array $authorInfo);

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return string
     */
    public function getSiteUrl(): string;
}
