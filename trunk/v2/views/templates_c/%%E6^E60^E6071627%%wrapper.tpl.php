<?php /* Smarty version 2.6.26, created on 2010-11-28 06:11:16
         compiled from wrapper.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "xmljunk.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<head>
<title>VolunteerOne - Helping You Help the World: <?php echo $this->_tpl_vars['this']->title(); ?>
</title>
<?php echo $this->_tpl_vars['this']->js(); ?>

<script type="text/javascript" src="views/js/ready.js"></script>
<?php echo $this->_tpl_vars['this']->css(); ?>

<link rel="stylesheet" type="text/css" href="views/css/v1.css" />
<link type="text/css" rel="stylesheet" href="views/css/calendar.css" />
</head>
<body class="bod">
<div class="header">
<div class="companyname">
<a href="?"><img src="images/v1logo.jpg"  alt="home" title="home" /></a>
</div>
    <div class="login_input">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</div>

<div class="content">
<div class="messages">
<h3 class="topmsg"><?php echo $this->_tpl_vars['topmsg']; ?>
</h3>
<h3 class="error"><?php echo $this->_tpl_vars['error']; ?>
</h3>
</div>
<div class="contentinsert">
<?php echo $this->_tpl_vars['content']; ?>

</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>
