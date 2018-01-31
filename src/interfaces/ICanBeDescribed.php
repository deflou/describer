<?php
namespace deflou\interfaces;

/**
 * ICanBeDescribed
 */
interface ICanBeDescribed
{
    const NAME = 'name';
    const TITLE = 'title';
    const DESCRIPTION = 'description';

    /**
     * @return string
     */
    public function getName(): string;
    
    /**
     * @return string
     */
    public function getTitle(): string;
    
    /**
     * @return string
     */
    public function getDescription(): string;
    
    /**
     * @return $this
     */
    public function setName($name);
    
    /**
     * @return $this
     */
    public function setTitle($title);
    
    /**
     * @return $this
     */
    public function setDescription($description);
    
    /**
     * @return mixed
     */
    public function describe();
}
