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

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Topic
 *
 * @author Maximilian Fäßler <maximilian@faesslerweb.de>
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwQuickcheck
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Topic extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     */
    protected string $name = '';


    /**
     * @var string
     */
    protected string $description = '';


    /**
     * @var \RKW\RkwQuickcheck\Domain\Model\Check|null
     */
    protected ?Check $check = null;


    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwQuickcheck\Domain\Model\Question>|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?ObjectStorage $question = null;


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
        $this->question = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }


    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription(): string
    {
        return $this->description;
    }


    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    /**
     * Returns the check
     *
     * @return \RKW\RkwQuickcheck\Domain\Model\Check|null
     */
    public function getCheck(): ?Check
    {
        return $this->check;
    }


    /**
     * Sets the check
     *
     * @param \RKW\RkwQuickcheck\Domain\Model\Check $check
     * @return void
     */
    public function setCheck(Check $check): void
    {
        $this->check = $check;
    }


    /**
     * Adds a Question
     *
     * @param \RKW\RkwQuickcheck\Domain\Model\Question $question
     * @return void
     */
    public function addQuestion(Question $question): void
    {
        $this->question->attach($question);
    }


    /**
     * Removes a Question
     *
     * @param \RKW\RkwQuickcheck\Domain\Model\Question $questionToRemove The Question to be removed
     * @return void
     */
    public function removeQuestion(Question $questionToRemove): void
    {
        $this->question->detach($questionToRemove);
    }


    /**
     * Returns the question
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwQuickcheck\Domain\Model\Question> $question
     */
    public function getQuestion(): ObjectStorage
    {
        return $this->question;
    }


    /**
     * Sets the question
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwQuickcheck\Domain\Model\Question> $question
     * @return void
     */
    public function setQuestion(ObjectStorage $question): void
    {
        $this->question = $question;
    }
}
