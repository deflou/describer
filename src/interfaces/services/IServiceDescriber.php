<?php
namespace deflou\interfaces\services;

use deflou\interfaces\services\options\IServiceOptionConfigured;
use deflou\interfaces\services\options\IServiceOptionDescribed;
use deflou\interfaces\services\IServiceConfig;
use deflou\interfaces\services\IServiceAuthor;
use deflou\interfaces\services\activities\IServiceEvent;
use deflou\interfaces\services\activities\IServiceAction;

/**
 * IServiceDescriber
 */
interface IServiceDescriber
{
    /**
     * @return $this
     */
    public function loadServiceConfig();
    
    /**
     * @param array|IServiceConfig $config
     *
     * @return $this
     */
    public function setServiceConfig($config);
    
    /**
     * @return IServiceConfig
     */
    public function getServiceConfig(): IServiceConfig;
    
    /**
     * @return string
     */
    public function getServiceName(): string;
    
    /**
     * @return string
     */
    public function getServiceTitle(): string;
    
    /**
     * @return string
     */
    public function getServiceDescription(): string;
    
    /**
     * @return string
     */
    public function getServiceVersion(): string;
    
    /**
     * @return string Resolver class name
     */
    public function getServiceResolver(): string;
    
    /**
     * @return IServiceAuthor[]
     */
    public function getServiceAuthors(): array;
    
    /**
     * @return IServiceOptionConfigured[]
     */
    public function getServiceOptions(): array;
    
    /**
     * @param string $optionName
     *
     * @return IServiceOptionConfigured
     */
    public function getServiceOption($optionName): IServiceOptionConfigured;
    
    /**
     * @return IServiceEvent[]
     */
    public function getServiceEvents(): array;
    
    /**
     * @return IServiceAction[]
     */
    public function getServiceActions(): array;
    
    /**
     * @param string $optionName
     * @param string $optionValue
     *
     * @return IServiceOptionDescribed
     */
    public function describeOption($optionName, $optionValue): IServiceOptionDescribed
}
