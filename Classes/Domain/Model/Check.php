<?php

namespace RKW\RkwQuickcheck\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Check
 *
 * @author Maximilian Fäßler <maximilian@faesslerweb.de>
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwQuickcheck
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Check extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * resultA
     *
     * @var string
     */
    protected $resultA = '';

    /**
     * resultB
     *
     * @var string
     */
    protected $resultB = '';

    /**
     * resultC
     *
     * @var string
     */
    protected $resultC = '';

    /**
     * topic
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwQuickcheck\Domain\Model\Topic>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $topic = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->topic = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the resultA
     *
     * @return string $resultA
     */
    public function getResultA()
    {
        return $this->resultA;
    }

    /**
     * Sets the resultA
     *
     * @param string $resultA
     * @return void
     */
    public function setResultA($resultA)
    {
        $this->resultA = $resultA;
    }

    /**
     * Returns the resultB
     *
     * @return string $resultB
     */
    public function getResultB()
    {
        return $this->resultB;
    }

    /**
     * Sets the resultB
     *
     * @param string $resultB
     * @return void
     */
    public function setResultB($resultB)
    {
        $this->resultB = $resultB;
    }

    /**
     * Returns the resultC
     *
     * @return string $resultC
     */
    public function getResultC()
    {
        return $this->resultC;
    }

    /**
     * Sets the resultC
     *
     * @param string $resultC
     * @return void
     */
    public function setResultC($resultC)
    {
        $this->resultC = $resultC;
    }

    /**
     * Adds a Topic
     *
     * @param \RKW\RkwQuickcheck\Domain\Model\Topic $topic
     * @return void
     */
    public function addTopic(\RKW\RkwQuickcheck\Domain\Model\Topic $topic)
    {
        $this->topic->attach($topic);
    }

    /**
     * Removes a Topic
     *
     * @param \RKW\RkwQuickcheck\Domain\Model\Topic $topicToRemove The Topic to be removed
     * @return void
     */
    public function removeTopic(\RKW\RkwQuickcheck\Domain\Model\Topic $topicToRemove)
    {
        $this->topic->detach($topicToRemove);
    }

    /**
     * Returns the topic
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwQuickcheck\Domain\Model\Topic> $topic
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Sets the topic
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwQuickcheck\Domain\Model\Topic> $topic
     * @return void
     */
    public function setTopic(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $topic)
    {
        $this->topic = $topic;
    }
}
