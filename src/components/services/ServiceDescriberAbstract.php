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
}
