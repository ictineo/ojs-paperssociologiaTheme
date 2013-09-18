<?php

/**
 * @file PapersThemePlugin.inc.php
 *
 * Copyright (c) 2013 Projecte Ictineo
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class PapersThemePlugin
 * @ingroup plugins_themes_papers
 *
 * @brief "Papers" theme plugin
 */

// $Id$


import('classes.plugins.ThemePlugin');

class PapersThemePlugin extends ThemePlugin {
	/**
	 * Get the name of this plugin. The name must be unique within
	 * its category.
	 * @return String name of plugin
	 */
	function getName() {
		return 'PapersThemePlugin';
	}

	function getDisplayName() {
		return 'Papers Theme';
	}

	function getDescription() {
		return 'A theme for Papers de Sociologia under CC-by-nc-sa';
	}

	function getStylesheetFilename() {
		return 'papers.css';
	}

	function getLocaleFilename($locale) {
		return null; // No locale data
	}

    function activate(&$templateMgr) {
            // Subclasses may override this function.

            if (($stylesheetFilename = $this->getStylesheetFilename()) != null) {
                    //ICT: Undo OJS default styles.
                    //$path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/ictReset/common.css';
                    //$templateMgr->addStyleSheet($path);
                    //$path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/ictReset/sidebar.css';
                    //$templateMgr->addStyleSheet($path);
                    //$path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/ictReset/rightSidebar.css';
                    //$templateMgr->addStyleSheet($path);
                    //$path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/ictReset/libpkp-content.css';
                    //$templateMgr->addStyleSheet($path);
                    //$path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/ictReset/libpkp-common.css';
                    //$templateMgr->addStyleSheet($path);

                    //ICT: Load fonts
                    $path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/fonts/stylesheet.css';
                    $templateMgr->addStyleSheet($path);


                    //ICT: Normalize styles
                    $path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/initializr/css/normalize.min.css';
                    $templateMgr->addStyleSheet($path);
                    $path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/initializr/css/main.css';
                    $templateMgr->addStyleSheet($path);
                    $path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/ictReset.css';
                    $templateMgr->addStyleSheet($path);

                    //ICT: Theme specific styles.
                    $path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/' . $stylesheetFilename;
                    $templateMgr->addStyleSheet($path);

                    //ICT: Page specific styles
                    $context = Request::getCompleteUrl();
                    if (strpos($context,'help') !== FALSE) {
                        $path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/' . 'help.css';
                        $templateMgr->addStyleSheet($path);
                    }
                     //ICT: Backend specific styles
                    if (strpos($context, 'editor') !== FALSE) {
                     $path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/' . 'backend.css';
                     $templateMgr->addStyleSheet($path);
                    }
                    //ICT: Admin Page
                    if (strpos($context, 'admin') !== FALSE) {
                      $path = Request::getBaseUrl() . '/' . $this->getPluginPath() . '/' . 'admin.css';
                      $templateMgr->addStyleSheet($path);
                    } 
            }

            //ICT: JQuery is included by default in OJS 2.3.x
            //$path = $this->getPluginPath() . '/js/jquery.min.js';
            //$templateMgr->addJavaScript($path);

            //ICT: JS for the Carousel 
            $path = $this->getPluginPath() . '/js/carouFredSel/jquery.carouFredSel.js';
            $templateMgr->addJavaScript($path);
            $path = $this->getPluginPath() . '/js/papers.js';
            $templateMgr->addJavaScript($path);
    }
}

?>
