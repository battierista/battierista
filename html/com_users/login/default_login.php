<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 * @copyright   (C) 2009 Open Source Matters, Inc.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Router\Route;

/** @var \Joomla\Component\Users\Site\View\Login\HtmlView $this */
/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->getDocument()->getWebAssetManager();
$wa->useScript('keepalive')
    ->useScript('form.validate');

$usersConfig = ComponentHelper::getParams('com_users');
?>

<div class="com-users-login container my-4">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <div class="mb-4">
            <h1 class="h2">
                <?php echo $this->escape($this->params->get('page_heading')); ?>
            </h1>
        </div>
    <?php endif; ?>

    <?php if (($this->params->get('logindescription_show') == 1 && trim($this->params->get('login_description', ''))) || $this->params->get('login_image') != '') : ?>
        <div class="com-users-login__description mb-3">
            <?php if ($this->params->get('logindescription_show') == 1) : ?>
                <p class="lead"><?php echo $this->params->get('login_description'); ?></p>
            <?php endif; ?>

            <?php if ($this->params->get('login_image') != '') : ?>
                <?php echo HTMLHelper::_('image', $this->params->get('login_image'), empty($this->params->get('login_image_alt')) && empty($this->params->get('login_image_alt_empty')) ? false : $this->params->get('login_image_alt'), ['class' => 'img-fluid mb-3']); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo Route::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="needs-validation" id="com-users-login__form" novalidate>
        <fieldset>
            <?php echo $this->form->renderFieldset('credentials', ['class' => 'mb-3']); ?>

            <?php if (PluginHelper::isEnabled('system', 'remember')) : ?>
                <div class="form-check mb-3">
                    <input class="form-check-input" id="remember" type="checkbox" name="remember" value="yes">
                    <label class="form-check-label" for="remember">
                        <?php echo Text::_('COM_USERS_LOGIN_REMEMBER_ME'); ?>
                    </label>
                </div>
            <?php endif; ?>

            <?php foreach ($this->extraButtons as $button) :
                $dataAttributeKeys = array_filter(array_keys($button), function ($key) {
                    return substr($key, 0, 5) == 'data-';
                });
                ?>
                <div class="mb-3">
                    <button type="button"
                            class="btn btn-outline-secondary <?php echo $button['class'] ?? ''; ?>"
                            <?php foreach ($dataAttributeKeys as $key) : ?>
                                <?php echo $key ?>="<?php echo $button[$key] ?>"
                            <?php endforeach; ?>
                            <?php if ($button['onclick']) : ?>
                                onclick="<?php echo $button['onclick'] ?>"
                            <?php endif; ?>
                            title="<?php echo Text::_($button['label']) ?>"
                            id="<?php echo $button['id'] ?>">
                        <?php if (!empty($button['icon'])) : ?>
                            <i class="<?php echo $button['icon']; ?>"></i>
                        <?php elseif (!empty($button['image'])) : ?>
                            <?php echo HTMLHelper::_('image', $button['image'], Text::_($button['tooltip'] ?? ''), ['class' => 'icon'], true); ?>
                        <?php elseif (!empty($button['svg'])) : ?>
                            <?php echo $button['svg']; ?>
                        <?php endif; ?>
                        <?php echo Text::_($button['label']); ?>
                    </button>
                </div>
            <?php endforeach; ?>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">
                    <?php echo Text::_('JLOGIN'); ?>
                </button>
            </div>

            <?php $return = $this->form->getValue('return', '', $this->params->get('login_redirect_url', $this->params->get('login_redirect_menuitem', ''))); ?>
            <input type="hidden" name="return" value="<?php echo base64_encode($return); ?>">
            <?php echo HTMLHelper::_('form.token'); ?>
        </fieldset>
    </form>

    <div class="com-users-login__options list-group mt-4">
        <a class="list-group-item list-group-item-action" href="<?php echo Route::_('index.php?option=com_users&view=reset'); ?>">
            <?php echo Text::_('COM_USERS_LOGIN_RESET'); ?>
        </a>
        <a class="list-group-item list-group-item-action" href="<?php echo Route::_('index.php?option=com_users&view=remind'); ?>">
            <?php echo Text::_('COM_USERS_LOGIN_REMIND'); ?>
        </a>
        <?php if ($usersConfig->get('allowUserRegistration')) : ?>
            <a class="list-group-item list-group-item-action" href="<?php echo Route::_('index.php?option=com_users&view=registration'); ?>">
                <?php echo Text::_('COM_USERS_LOGIN_REGISTER'); ?>
            </a>
        <?php endif; ?>
    </div>
</div>
