<?php /* Smarty version 2.6.26, created on 2010-11-28 06:30:26
         compiled from volunteer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'volunteer.tpl', 6, false),)), $this); ?>
<h1>Volunteer<?php if ($this->_tpl_vars['ldata']['user_type'] == 'volunteer'): ?> Dashboard<?php else: ?>s<?php endif; ?></h1>

<?php if ($this->_tpl_vars['ldata']['user_type'] == 'volunteer'): ?>
<div class="volunteer login">

<span class="volmenu"><?php echo $this->_tpl_vars['ldata']['details']['name_first']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['ldata']['email'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
</span>
<span class="volmenu"><a href="?action=volunteer/edit">My Profile</a></span>
<span class="volmenu"><a href="#volsched">My Schedule</a></span>
<span class="volmenu"><a href="#volstats">My Stats</a></span>
<?php if ($_SESSION['paged']['jobsearch']): ?><i><a href="?action=search">Back to search</a></i> &nbsp;&nbsp; <?php endif; ?>
</div>

<div class="volunteer stats">
<h2>My Schedule</h2>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "volsched.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<div class="volunteer stats">
<h2>My Stats</h2>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "volstats.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<?php else: ?>
<div class="vollogin">
<a href="?action=volunteer/signup">Sign up today!</a>
</div>
<h2>Benefits of Volunteering</h2>
<i>Blurb</i>

<?php endif; ?>
