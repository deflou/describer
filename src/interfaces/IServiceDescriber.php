<?php
namespace deflou\interfaces;

interface IServiceDescriber
{
    public function loadServiceConfig();
    
    public function setServiceConfig($config);
    
    public function getServiceConfig(): array;
    
    public function getServiceName(): string;
    
    public function getServiceTitle(): string;
    
    public function getServiceDescription(): string;
    
    public function getServiceVersion(): string;
    
    public function getServiceResolver(): string;
    
    public function getServiceAuthors(): array;
    
    public function getServiceOptions(): array;
    
    public function getServiceEvents(): array;
    
    public function getServiceActions(): array;
}
