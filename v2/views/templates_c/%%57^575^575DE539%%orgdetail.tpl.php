<?php /* Smarty version 2.6.26, created on 2010-11-22 09:01:40
         compiled from orgdetail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'orgdetail.tpl', 2, false),array('modifier', 'fixurl', 'orgdetail.tpl', 41, false),array('modifier', 'addbrs', 'orgdetail.tpl', 51, false),)), $this); ?>
<div class="organization detail">
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['org']['name'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</h2>
<table class="dump " border="0" cellpadding="5" cellspacing="0">
<tr valign="top">
<td>
<b>Contact</b>
</td>
<td>
<?php echo $this->_tpl_vars['org']['contact_name_first']; ?>
 <?php echo $this->_tpl_vars['org']['contact_name_last']; ?>

</td>
</tr>
<tr valign="top">
<td>
<b>Phone</b>
</td>
<td>
<?php echo $this->_tpl_vars['org']['contact_phone']; ?>

</td>
</tr>
<tr valign="top">
<td>
<b>Email</b>
</td>
<td>

<?php if ($this->_tpl_vars['ldata']): ?>
<a href="?action=organization/contact">Click here to send a message</a>
<?php else: ?>
<a href="?action=volunteer">Sign up/Log in to contact this employer</a>
<?php endif; ?>

</td>
</tr>

<?php if ($this->_tpl_vars['org']['url']): ?>
<tr valign="top">
<td>
<b>Website</b>
</td>
<td>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['org']['url'])) ? $this->_run_mod_handler('fixurl', true, $_tmp) : smarty_modifier_fixurl($_tmp)); ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['org']['url'])) ? $this->_run_mod_handler('fixurl', true, $_tmp) : smarty_modifier_fixurl($_tmp)); ?>
</a>
</td>
</tr>
<?php endif; ?>

<tr valign="top">
<td>
<b><nobr>Mission Statement</nobr></b>
</td>
<td>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['org']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('addbrs', true, $_tmp) : smarty_modifier_addbrs($_tmp)); ?>

</td>
</tr>
</table>
</div>
