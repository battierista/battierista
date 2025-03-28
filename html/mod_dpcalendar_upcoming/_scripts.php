<?php
/**
 * @package   DPCalendar
 * @copyright Copyright (C) 2018 Digital Peak GmbH. <https://www.digital-peak.com>
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */

\defined('_JEXEC') or die();

// Load the required modal JS libraries
if ($params->get('show_as_popup') || $params->get('show_map')) {
	$document->loadScriptFile('default.js', 'mod_dpcalendar_upcoming');
	$translator->translateJS('COM_DPCALENDAR_CLOSE');
}

if ($params->get('show_map')) {
	$layoutHelper->renderLayout('block.map', $displayData);
}

// Load the stylesheet
$document->loadStyleFile(str_replace('_:', '', (string)$params->get('layout', 'default')) . '.css', 'mod_dpcalendar_upcoming');
$document->addStyle($params->get('custom_css', ''));
