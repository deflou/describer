<?php
namespace deflou\components;

use deflou\interfaces\IServiceDescriber;
use deflou\interfaces\IServiceConfig;
use deflou\components\ServiceConfigBase;

abstract class ServiceDescriberAbstract implements IServiceDescriber
{
    protected $basePath = __DIR__ . '/../../';
    
    /**
     * @var IServiceConfig
     */
    protected $serviceConfig = null;
    
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
    
    public function setServiceConfig($config)
    {
        $config = new ServiceConfigBase($config);
        
        if ($config->isNotValid()) {
            throw new \Exception('Service config is not valid: ' . $config->getErrors());
        }
        
        $this->serviceConfig = $config;
        
        return $this;
    }
}
