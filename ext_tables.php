<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Imaging\IconRegistry::class
);

$iconRegistry->registerIcon(
    'prism-icon',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:prism/ext_icon.gif']
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tt_content',
    'EXT:prism/Resources/Private/Language/locallang_csh_tt_content.xlf'
);
