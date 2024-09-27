<?php
declare(strict_types=1);
namespace In2code\Osm\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class StringUtility
{
    public static function integerList(string $list): string
    {
        return implode(',', GeneralUtility::intExplode(',', $list));
    }
    public function myAction()
    {
        // Beispiel: Auslesen eines GET-Parameters 'myParam'
        $myParam = GeneralUtility::_GP('card');

        // Mach etwas mit dem Parameter
        $this->view->assign('card', $carduuid);
    }
}
