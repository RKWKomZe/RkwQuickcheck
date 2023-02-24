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
 * Question
 *
 * @author Maximilian Fäßler <maximilian@faesslerweb.de>
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwQuickcheck
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Question extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     */
    protected string $question = '';


    /**
     * @var string
     */
    protected string $description = '';


    /**
     * @var \RKW\RkwQuickcheck\Domain\Model\Topic|null
     */
    protected ?Topic $topic = null;


    /**
     * Returns the question
     *
     * @return string $question
     */
    public function getQuestion(): string
    {
        return $this->question;
    }


    /**
     * Sets the question
     *
     * @param string $question
     * @return void
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
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
     * Returns the topic
     *
     * @return \RKW\RkwQuickcheck\Domain\Model\Topic topic
     */
    public function getTopic(): ?Topic
    {
        return $this->topic;
    }


    /**
     * Sets the topic
     *
     * @param \RKW\RkwQuickcheck\Domain\Model\Topic $topic
     * @return void
     */
    public function setTopic(Topic $topic): void
    {
        $this->topic = $topic;
    }
}
