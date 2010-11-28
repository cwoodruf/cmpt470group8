<?php /* Smarty version 2.6.26, created on 2010-11-21 18:06:38
         compiled from orgloginlist.tpl */ ?>
<ul class="organization login">

<?php $_from = $this->_tpl_vars['orglogins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['login']):
?>
<li class="organization login">
<?php echo $this->_tpl_vars['login']['email']; ?>


<?php if ($this->_tpl_vars['ldata']['login'] == $this->_tpl_vars['ldata']['details']['contact_email']): ?>
&nbsp;&nbsp;
<a href="?action=organization/login/edit&email=<?php echo $this->_tpl_vars['login']['email']; ?>
">Edit</a> &nbsp;

<?php if ($this->_tpl_vars['login']['email'] != $this->_tpl_vars['ldata']['login']): ?>
<a href="?action=organization/login/confirmdel&email=<?php echo $this->_tpl_vars['login']['email']; ?>
">Delete</a> &nbsp;
<?php endif; ?>

<?php endif; ?>
</li>

<?php endforeach; endif; unset($_from); ?>
</ul>