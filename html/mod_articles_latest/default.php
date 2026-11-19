<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

if (!$list) {
    return;
}

?>
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($list as $article): $images = json_decode($article->images); ?>
        <div class="col">
	        <div class="card h-100 shadow-sm">
                
                <?php if(isset($images->image_intro) && !empty($images->image_intro)): ?>
                <div class="card-img-theater">
	            	<img src="<?php echo htmlspecialchars($images->image_intro); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($article->title); ?>">
                </div>
                <?php endif; ?>
                
                <div class="card-body">
	                <h3 class="card-title"><a href="<?php echo $article->link; ?>"><?php echo htmlspecialchars($article->title); ?></a></h3>
                    <p class="card-text"><?php echo HTMLHelper::_('string.truncate', strip_tags($article->introtext), 100); ?></p>
                    <p class="card-text text-muted"><?php echo HTMLHelper::_('date', $article->created, Text::_('DATE_FORMAT_LC3')); ?></p>
                </div>
              </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

