<?php /* Smarty version 2.6.26, created on 2010-10-12 20:52:55
         compiled from contactlinks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'contactlinks.tpl', 1, false),)), $this); ?>
<?php ob_start(); ?><?php echo htmlentities($this->_tpl_vars['data']['contact_email']); ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('email', ob_get_contents());ob_end_clean(); ?>
<li>
<?php echo $this->_tpl_vars['email']; ?>

<a href="mailto://<?php echo $this->_tpl_vars['email']; ?>
">send email</a> &nbsp;&nbsp;
<a href="?action=home/contact/confirmdelete&contact_email=<?php echo $this->_tpl_vars['email']; ?>
">delete</a> &nbsp;&nbsp;
<a href="?action=home/contact/show&contact_email=<?php echo $this->_tpl_vars['email']; ?>
">view</a>
</li>