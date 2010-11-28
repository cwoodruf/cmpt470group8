<?php /* Smarty version 2.6.26, created on 2010-11-21 23:50:12
         compiled from job.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'job.tpl', 2, false),array('modifier', 'capitalize', 'job.tpl', 2, false),)), $this); ?>
<div class="job">
<h1><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['action'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Add') : smarty_modifier_default($_tmp, 'Add')))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 a Job</h1>
<form id="formgen" action="index.php" method="post">
<input type="hidden" name="jobID" value="<?php echo $this->_tpl_vars['this']->input('jobID'); ?>
" />
<table class="formgen" border="0" cellpadding="5" cellspacing="0">
<tr class="formgen" valign="top">
<tr class="formgen" valign="top">
<td class="formgen"><b>Job title</b></td>
<td class="formgen">
<input name="title" size="60" value="<?php echo $this->_tpl_vars['this']->input('title'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>URL</b></td>
<td class="formgen">
<input name="url" size="60" value="<?php echo $this->_tpl_vars['this']->input('url'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>City</b></td>
<td class="formgen">
<input name="city" size="60" value="<?php echo $this->_tpl_vars['this']->input('city'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Province</b></td>
<td class="formgen">
<input name="country" size="32" value="<?php echo $this->_tpl_vars['this']->input('country'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Description</b></td>
<td class="formgen">
<textarea name="description" rows="5" cols="60"><?php echo $this->_tpl_vars['this']->input('description'); ?>
</textarea>
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Requirements</b></td>
<td class="formgen">
<textarea name="requirements" rows="5" cols="60"><?php echo $this->_tpl_vars['this']->input('requirements'); ?>
</textarea>
</td>
</tr>
<tr class="formgen formbuttons">
<td class="formgen formbuttons">
<input value="reset" type="reset">
</td>
<td class="formgen formbuttons" align="right">
<input name="action[]" value="jobs" type="hidden" />
<?php if ($this->_tpl_vars['action']): ?>
<input name="action[]" value="<?php echo $this->_tpl_vars['action']; ?>
" type="hidden" />
<?php endif; ?>
<input name="action[]" value="save" type="submit" />
</td>
</tr>
</table>
</form>
</div>
