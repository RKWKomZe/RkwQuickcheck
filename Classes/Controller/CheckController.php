<?php
namespace RKW\RkwQuickcheck\Controller;

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

use RKW\RkwQuickcheck\Domain\Repository\CheckRepository;

/**
 * CheckController
 *
 * @author Maximilian Fäßler <maximilian@faesslerweb.de>
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwQuickcheck
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class CheckController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * @var \RKW\RkwQuickcheck\Domain\Repository\CheckRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected CheckRepository $checkRepository;


    /**
     * action index
     *
     * @return void
     */
    public function indexAction(): void
    {
        $this->view->assign('check', $this->checkRepository->findByIdentifier(intval($this->settings['check'])));
    }


    /**
     * action show
     *
     * @param bool $dummy
     * @return void
     * @TYPO3\CMS\Extbase\Annotation\Validate("Madj2k\FeRegister\Validation\Consent\TermsValidator", param="dummy")
     */
    public function showAction(bool $dummy): void
    {
        $this->view->assign('check', $this->checkRepository->findByIdentifier(intval($this->settings['check'])));
    }


    /**
     * action result
     *
     * @param array $checkExec
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException;
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException;
     * @return void
     */
    public function resultAction(array $checkExec = []): void
    {
        // 1. If check is null send user to index
        if (!$checkExec) {

            $this->addFlashMessage(
                \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('checkController.error.no_data', 'rkw_quickcheck')
            );
            $this->redirect('index');
        }

        // 2. check if all questions are answered
        $check = $this->checkRepository->findByIdentifier(intval($this->settings['check']));
        $questionsOverall = 0;
        /** @var \RKW\RkwQuickcheck\Domain\Model\Topic $topic */
        foreach ($check->getTopic() as $topic) {
            foreach ($topic->getQuestion() as $question) {
                $questionsOverall++;
            }
        }

        // substrate terms-entry of $checkExec-Array and compare will question-count of the check
        $nonQuestionElements = 0;
        foreach ($checkExec as $key => $formElement) {
            if (!strpos($key, 'quest')) {
                $nonQuestionElements++;
            }
        }

        if ((count($checkExec) - $nonQuestionElements) < $questionsOverall) {
            // please accept the terms!
            $this->addFlashMessage(
                \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('checkController.error.not_complete', 'rkw_quickcheck')
            );
            $this->redirect('show', null, null, array('checkExec' => $checkExec));
        }

        // 3. calculate
        // exclude terms and other entries from form (all non array-entries)
        foreach ($checkExec as $key => $formElement) {
            if (!strpos($key, 'quest')) {
                array_shift($checkExec);
            }
        }
        $answeredWithYes = 0;
        foreach ($checkExec as $question) {
            if (intval($question) == 1) {
                $answeredWithYes++;
            }
        }

        $outcome = $answeredWithYes / $questionsOverall * 100;

        // quick & dirty
        if ($outcome <= 35) {
            $result = $check->getResultC();
            $valueColor = 'bad';
        } elseif ($outcome <= 64) {
            $result = $check->getResultB();
            $valueColor = 'normal';
        } else {
            $result = $check->getResultA();
            $valueColor = 'good';
        }

        $this->view->assign('outcome', round($outcome));
        $this->view->assign('result', $result);
        $this->view->assign('check', $check);
        $this->view->assign('checkExec', $checkExec);
        $this->view->assign('valueColor', $valueColor);
    }


    /**
     * A template method for displaying custom error flash messages, or to
     * display no flash message at all on errors. Override this to customize
     * the flash message in your action controller.
     *
     * @return string|false The flash message or FALSE if no flash message should be set
     */
    protected function getErrorFlashMessage()
    {
        return false;
    }
}
