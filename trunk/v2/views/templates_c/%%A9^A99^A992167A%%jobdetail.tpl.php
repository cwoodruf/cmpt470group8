<?php /* Smarty version 2.6.26, created on 2010-11-22 09:00:37
         compiled from jobdetail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'jobdetail.tpl', 14, false),array('modifier', 'default', 'jobdetail.tpl', 17, false),array('modifier', 'fixurl', 'jobdetail.tpl', 35, false),array('modifier', 'addbrs', 'jobdetail.tpl', 53, false),)), $this); ?>
<div class="jobs">
<?php if ($this->_tpl_vars['ldata']['user_type'] == 'organization'): ?>
<a href="?action=jobs">Back to Job Manager</a>
<?php else: ?>
<a href="?action=search">Back to search results</a>
<?php endif; ?>
<h1>Job Detail</h1>
<table class="dump " border="0" cellpadding="5" cellspacing="0">
<tr valign="top">
<td>
<b>Title</b>
</td>
<td>
<?php echo ((is_array($_tmp=$this->_tpl_vars['job']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

<br />
<a href="?action=organization/detail&organizationID=<?php echo $this->_tpl_vars['job']['organizationID']; ?>
&jobID=<?php echo $this->_tpl_vars['job']['jobID']; ?>
">
More about <?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['job']['orgname'])) ? $this->_run_mod_handler('default', true, $_tmp, 'this employer') : smarty_modifier_default($_tmp, 'this employer')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
<br />

<?php if ($this->_tpl_vars['ldata']): ?>
<a href="?action=jobs/contact">Contact <?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['job']['orgname'])) ? $this->_run_mod_handler('default', true, $_tmp, 'this employer') : smarty_modifier_default($_tmp, 'this employer')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
<?php else: ?>
<a href="?action=volunteer">Sign up/Log in to contact this employer</a>
<?php endif; ?>

</td>
</tr>

<?php if ($this->_tpl_vars['job']['url']): ?>
<tr valign="top">
<td>
<b>URL</b>
</td>
<td>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['job']['url'])) ? $this->_run_mod_handler('fixurl', true, $_tmp) : smarty_modifier_fixurl($_tmp)); ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['job']['url'])) ? $this->_run_mod_handler('fixurl', true, $_tmp) : smarty_modifier_fixurl($_tmp)); ?>
</a>
</td>
</tr>
<?php endif; ?>

<tr valign="top">
<td>
<b>Location</b>
</td>
<td>
<?php echo ((is_array($_tmp=$this->_tpl_vars['job']['city'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['job']['country'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

</td>
</tr>
<tr valign="top">
<td>
<b>Description</b>
</td>
<td>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['job']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('addbrs', true, $_tmp) : smarty_modifier_addbrs($_tmp)); ?>

</td>
</tr>
<tr valign="top">
<td>
<b>Requirements</b>
</td>
<td>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['job']['requirements'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('addbrs', true, $_tmp) : smarty_modifier_addbrs($_tmp)); ?>

</td>
</tr>

<?php if ($this->_tpl_vars['job']['created']): ?>
<tr valign="top">
<td>
<b>Created on</b>
</td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['job']['created'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
</tr>
<?php endif; ?>

</table>

</div>