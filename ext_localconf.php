<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(
    function () {
        /**
         * Include Frontend Plugins
         */
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Osm',
            'Markers',
            [\In2code\Osm\Controller\MapController::class => 'getMarkers',]
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Osm',
            'Pi1',
            [\In2code\Osm\Controller\MapController::class => 'plugin1',]
        );
        if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('tt_address')) {
            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
                'Osm',
                'Pi2',
                [\In2code\Osm\Controller\MapController::class => 'plugin2',]
            );
        }

        /**
         * Add page TSConfig
         */
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            '@import \'EXT:osm/Configuration/TSConfig/Osm.typoscript\''
        );

        /**
        * Add Typoscrit
        * Error Handling Not Loaded PizPalue
        */
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
            '@import "EXT:osm/Configuration/TypoScript/setup.typoscript"'
        );

        /**
         * Add user func for TCA fields
         */
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1600424607] = [
            'nodeName' => 'osm_pi1_information',
            'priority' => 50,
            'class' => \In2code\Osm\Tca\Information::class,
        ];
    }
);
