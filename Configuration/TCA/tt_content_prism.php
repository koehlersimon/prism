<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {
	$frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
		'tt_content',
		'CType',
		[
			'Prism',
			'prism',
			'prism-icon'
		],
		'header',
		'after'
	);

	// New palette header
	$GLOBALS['TCA']['tt_content']['palettes']['header'] = array(
		'showitem' => 'header,header_layout','canNotCollapse' => 1
	);

	// New palette content
	$GLOBALS['TCA']['tt_content']['palettes']['layout_type'] = array(
		'showitem' => 'prism_layout,prism_code_type,prism_line_highlight','canNotCollapse' => 1
	);

	$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['prism'] = 'prism-icon';
	$GLOBALS['TCA']['tt_content']['types']['prism'] = [
		'showitem' => '
                --palette--;;header,
				--palette--;;layout_type,
				bodytext,
				--div--;Additional,
				--palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
            	--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            	--div--;' . $frontendLanguageFilePrefix . 'tabs.access,
                hidden;' . $frontendLanguageFilePrefix . 'field.default.hidden,
                --palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
            	--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
        ',
        'columnsOverrides' => [
			'bodytext' => [
				'label' => 'LLL:EXT:prism/Resources/Private/Language/locallang.xlf:bodytext',
				'config' => [
					'type' => 'text',
			        'renderType' => 't3editor',
			        'format' => 'html',
			        'rows' => 20,
				],
			],
        ]
    ];

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', [
	    'prism_code_type' => [
	        'exclude' => 0,
			'label' => 'LLL:EXT:prism/Resources/Private/Language/locallang.xlf:prism_code_type',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					['Default (Markup)', 'markup'],
					['JavaScript', 'javascipt'],
					['PHP', 'php'],
					['HTML', 'html'],
					['CSS', 'css'],
					['JSON', 'json'],
					['YAML', 'yaml'],
				]
			],
	    ],
		'prism_layout' => [
	        'exclude' => 0,
			'label' => 'Layout',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					['Default (Markup)', 'default'],
					['Dark', 'dark'],
					['Funky', 'funky'],
					['Okaidia', 'okaidia'],
					['Solarized Light', 'solarized-light'],
					['Tomorrow Night', 'tomorrow-night'],
					['Twilight', 'twilight'],
				]
			],
	    ],
		'prism_line_highlight' => [
	        'exclude' => 0,
			'label' => 'LLL:EXT:prism/Resources/Private/Language/locallang.xlf:prism_line_highlight',
			'config' => [
				'type' => 'input',
			],
	    ],
	]);

});
