<?php /* Smarty version 2.6.26, created on 2010-11-28 03:01:17
         compiled from menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'menu.tpl', 16, false),array('function', 'login_params', 'menu.tpl', 37, false),)), $this); ?>
<?php if ($this->_tpl_vars['ldata']['user_type'] == 'volunteer' || $this->_tpl_vars['ldata']['user_type'] == 'organization' || $this->_tpl_vars['ldata']['user_type'] == 'admin'): ?>
	<?php $this->assign('editor', true); ?>
<?php endif; ?>

<div class="menu">
<div class="menuitem">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "searchform.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div class="menuend"></div>

<?php if ($this->_tpl_vars['editor']): ?>
<div class="menuitem">
<span class="loginemail"><?php echo $this->_tpl_vars['ldata']['email']; ?>
:</span>
</div>
<div class="menuitem">
<a href="?action=<?php echo $this->_tpl_vars['ldata']['user_type']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['ldata']['user_type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 dashboard</a>
</div>
<?php else: ?>
<div class="menuitem">
<a href="?">Home</a>
</div>
<div class="menuitem">
<a href="?action=organization">Organizations</a>
</div>
<div class="menuitem">
<a href="?action=volunteer">Volunteers</a>
</div>
<?php endif; ?>

<div class="menuitem">
<?php if ($this->_tpl_vars['ldata']): ?>
<a href="?action=logout">Log out</a>
<?php else: ?>
<a href="javascript: void(0);" id="login_link" >Log in</a>
<div id="login_form" >
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tools/loginajaxform.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php echo smarty_function_login_params(array(), $this);?>

    <div class="login-input">
    <span class="ename"> Email  </span>
    <input type="text" name="login" class="input_box1"/>
    </div>

    <div class="login-input">
    <span class="pname"> Password  </span>
    <input type="password" name="password" class="input_box2" />
    </div>

    <div class="login-input">
    <a href="?action=password/recover">Forgot your password?</a> 
    <input type="submit" name="submit" value="Log In" class="login_button" />
    </div>
</form>
</div>
<?php endif; ?>
</div>

</div>
<div class="menuend"></div>