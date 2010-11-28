<?php /* Smarty version 2.6.26, created on 2010-11-16 21:33:37
         compiled from hourselect.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'option', 'hourselect.tpl', 9, false),)), $this); ?>
<?php if ($this->_tpl_vars['select'] == ''): ?>
	<?php $this->assign('select', $this->_tpl_vars['name']); ?>
<?php endif; ?>

<select name="<?php echo $this->_tpl_vars['name']; ?>
">
<option></option>

<?php unset($this->_sections['opt']);
$this->_sections['opt']['name'] = 'opt';
$this->_sections['opt']['start'] = (int)1;
$this->_sections['opt']['loop'] = is_array($_loop=25) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['opt']['show'] = true;
$this->_sections['opt']['max'] = $this->_sections['opt']['loop'];
$this->_sections['opt']['step'] = 1;
if ($this->_sections['opt']['start'] < 0)
    $this->_sections['opt']['start'] = max($this->_sections['opt']['step'] > 0 ? 0 : -1, $this->_sections['opt']['loop'] + $this->_sections['opt']['start']);
else
    $this->_sections['opt']['start'] = min($this->_sections['opt']['start'], $this->_sections['opt']['step'] > 0 ? $this->_sections['opt']['loop'] : $this->_sections['opt']['loop']-1);
if ($this->_sections['opt']['show']) {
    $this->_sections['opt']['total'] = min(ceil(($this->_sections['opt']['step'] > 0 ? $this->_sections['opt']['loop'] - $this->_sections['opt']['start'] : $this->_sections['opt']['start']+1)/abs($this->_sections['opt']['step'])), $this->_sections['opt']['max']);
    if ($this->_sections['opt']['total'] == 0)
        $this->_sections['opt']['show'] = false;
} else
    $this->_sections['opt']['total'] = 0;
if ($this->_sections['opt']['show']):

            for ($this->_sections['opt']['index'] = $this->_sections['opt']['start'], $this->_sections['opt']['iteration'] = 1;
                 $this->_sections['opt']['iteration'] <= $this->_sections['opt']['total'];
                 $this->_sections['opt']['index'] += $this->_sections['opt']['step'], $this->_sections['opt']['iteration']++):
$this->_sections['opt']['rownum'] = $this->_sections['opt']['iteration'];
$this->_sections['opt']['index_prev'] = $this->_sections['opt']['index'] - $this->_sections['opt']['step'];
$this->_sections['opt']['index_next'] = $this->_sections['opt']['index'] + $this->_sections['opt']['step'];
$this->_sections['opt']['first']      = ($this->_sections['opt']['iteration'] == 1);
$this->_sections['opt']['last']       = ($this->_sections['opt']['iteration'] == $this->_sections['opt']['total']);
?>
<?php echo smarty_function_option(array('value' => $this->_sections['opt']['index']), $this);?>

<?php endfor; endif; ?>

</select>
