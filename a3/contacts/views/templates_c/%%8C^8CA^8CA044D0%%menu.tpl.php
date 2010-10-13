<?php /* Smarty version 2.6.26, created on 2010-10-12 18:49:46
         compiled from menu.tpl */ ?>
<div class="menu">

<div class="menuitem">
<a href="index.php">Home</a>
</div>

<div class="menuitem">

<?php if ($_SESSION['login']): ?>
<nobr>
Welcome
<a href="?action=register/edit&email=<?php echo $_SESSION['login']['login']; ?>
">
<b><?php echo $_SESSION['login']['login']; ?>
</b></a>
&nbsp;
<a href="index.php?action=logout">Log out</a>
</nobr>

<?php else: ?>
<a href="index.php?action=register">Create a log in</a>
<?php endif; ?>

</div>

<div class="menuitem">
<a href="/group8wiki/index.php/Framework_Docs">Framework docs</a>
</div>

</div>

<div style="clear: both;"></div>