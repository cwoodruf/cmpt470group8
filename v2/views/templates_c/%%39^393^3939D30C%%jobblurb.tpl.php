<?php /* Smarty version 2.6.26, created on 2010-11-28 06:32:30
         compiled from jobblurb.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'jobblurb.tpl', 7, false),array('modifier', 'htmlentities', 'jobblurb.tpl', 7, false),)), $this); ?>
<p>
<?php echo $this->_tpl_vars['job']['created']; ?>

<b><?php echo $this->_tpl_vars['job']['title']; ?>
</b>
<?php echo $this->_tpl_vars['job']['orgname']; ?>
 &nbsp;
<i><?php echo $this->_tpl_vars['job']['city']; ?>
, <?php echo $this->_tpl_vars['job']['country']; ?>
</i>
<br />
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['job']['blurb'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
</b> ... 

(<a href="?action=jobs/detail&jobID=<?php echo $this->_tpl_vars['job']['jobID']; ?>
">more</a>)

</p>