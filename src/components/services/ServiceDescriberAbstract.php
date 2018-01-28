<?php
namespace deflou\components\services;

use deflou\interfaces\services\IServiceDescriber;
use deflou\interfaces\services\IServiceConfig;
use deflou\components\services\ServiceConfigBase;

/**
 * ServiceDescriberAbstract
 */
abstract class ServiceDescriberAbstract implements IServiceDescriber
{
    /**
     * Base path to df.php (service configuration)
     *
     * @var string
     */
    protected $basePath = __DIR__ . '/../../';
    
    /**
     * @var IServiceConfig
     */
    protected $serviceConfig = null;
    
    /**
     * @return $this
     */
    public function loadServiceConfig()
    {
        $configFullPath = $this->basePath . 'df.php';
        
        if (is_file($configFullPath)) {
            $serviceConfig = include $configFullPath;
            $config = new ServiceConfigBase($serviceConfig);
            if ($config->isNotValid()) {
                throw new \Exception('Service config is not valid: ' . $config->getErrors());
            }
            
            $this->serviceConfig = $config;
        } else {
            throw new \Exception('Service config "' . $configFullPath . '" missed or permission denied');
        }
        
        return $this;
    }
    
    /**
     * @param array|IServiceConfig
     * 
     * @return $this
     */
    public function setServiceConfig($config)
    {
        $config = is_object($config) && ($config instanceof IServiceConfig) ? $config : new ServiceConfigBase($config);
        
        if ($config->isNotValid()) {
            throw new \Exception('Service config is not valid: ' . $config->getErrors());
        }
        
        $this->serviceConfig = $config;
        
        return $this;
    }
    
    /**
     * @return IServiceConfig
     * @throws \Exception
     */
    public function getServiceConfig(): IServiceConfig
    {
        if (!$this->serviceConfig) {
            throw new \Exception('Service config is not initialized or set.');
        }
        
        return $this->serviceConfig;
    }
    
    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->getServiceConfig()->getServiceName();
    }
    
    /**
     * @return string
     */
    public function getServiceTitle(): string
    {
        return $this->getServiceConfig()->getServiceTitle();
    }
    
    /**
     * @return string
     */
    public function getServiceDescription(): string
    {
        return $this->getServiceConfig()->getServiceDescription();
    }
    
    /**
     * @return string
     */
    public function getServiceVersion(): string
    {
        return $this->getServiceConfig()->getServiceVersion();
    }
    
    /**
     * @return string Resolver class name
     */
    public function getServiceResolver(): string
    {
        return $this->getServiceConfig()->getServiceResolver();
    }
    
    /**
     * @return IServiceAuthor[]
     */
    public function getServiceAuthors(): array
    {
        $authorsConfigs = $this->getServiceConfig()->getServiceAuthors();
        $authors = [];
        
        foreach ($authorsConfigs as $authorConfig) {
            $authors[] = new ServiceAuthorBase($authorConfig);
        }
        
        return $authors;
    }
    
    /**
     * @return IServiceOptionConfigured[]
     */
    public function getServiceOptions(): array
    {
        $optionsConfigs = $this->getServiceConfig()->getServiceOptions();
        $options = [];
        
        foreach ($optionsConfigs as $optionConfig) {
            $options = new ServiceOptionConfigured($optionConfig);
        }
        
        return $options;
    }
    
    /**
     * @param string $optionName
     *
     * @return IServiceOptionConfigured
     * @throws \Exception
     */
    public function getServiceOption($optionName): IServiceOptionConfigured
    {
        if ($this->getServiceConfig()->hasServiceOption($optionName)) {
            return new ServiceOptionConfigured($this->getServiceConfig()->getServiceOption($optionName));
        }
        
        throw new \Exception('Unknown or missed option "' . $optionName . '"');
    }
    
    /**
     * @return IServiceEvent[]
     */
    public function getServiceEvents(): array
    {
        $eventsConfigs = $this->getConfig()->getServiceEvents();
        $events = [];
        
        foreach ($eventsConfigs as $eventConfig) {
            $events[] = new ServiceEventBase($eventConfig);
        }
        
        return $events;
    }
    
    /**
     * @return IServiceAction[]
     */
    public function getServiceActions(): array
    {
        $actionsConfigs = $this->getConfig()->getServiceActions();
        $actions = [];
        
        foreach ($actionsConfigs as $actionConfig) {
            $actions[] = new ServiceEventBase($actionConfig);
        }
        
        return $actions;
    }
    
    /**
     * @param string $optionName
     * @param string $optionValue
     *
     * @return IServiceOptionDescribed
     */
    public function describeOption($optionName, $optionValue): IServiceOptionDescribed
    {
        return method_exists($this, $optionName . 'Describe')
            ? $this->{$optionName . 'Describe'}($optionValue)
            : new ServiceOptionDescribed($this->getOption($optionName), $optionValue);
    }
}
