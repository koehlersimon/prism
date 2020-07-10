<?php
namespace SIMONKOEHLER\Prism\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class PrismViewHelper extends AbstractViewHelper
{
   use CompileWithRenderStatic;

   public function initializeArguments()
    {
        $this->registerArgument('source', 'string', '<html>code here...</html>', true);
    }

   public static function renderStatic(
       array $arguments,
       \Closure $renderChildrenClosure,
       RenderingContextInterface $renderingContext
   ) {
       // Add layout styles to the page
       //$renderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
       //$renderer->addJsInlineCode('effects','');

       // Return source code
       return $arguments['source'];
   }
}
