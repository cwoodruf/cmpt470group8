<?php /* Smarty version 2.6.26, created on 2010-11-28 06:33:15
         compiled from organization.tpl */ ?>
<h1>Organization<?php if ($this->_tpl_vars['ldata']['user_type'] == 'organization'): ?> Dashboard<?php else: ?>s<?php endif; ?></h1>

<?php if ($this->_tpl_vars['ldata']['user_type'] == 'organization'): ?>
<div class="organization login">

<h4><?php echo $this->_tpl_vars['ldata']['details']['name']; ?>
</h4>

<?php if ($this->_tpl_vars['ldata']['login'] == $this->_tpl_vars['ldata']['details']['contact_email']): ?>
<a href="?action=organization/edit">Organization Profile</a> &nbsp;
<a href="?action=organization/login">Logins</a> &nbsp;
<?php endif; ?>

<a href="?action=organization/login/edit">Change password</a> &nbsp;
<a href="?action=jobs">Manage Jobs</a> &nbsp;
</div>

<div class="organization schedule">
<a name="calendar"></a>
<?php echo $this->_tpl_vars['calendar']; ?>

</div>
</div>

<?php else: ?>
<div class="orglogin">
<a href="?action=organization/signup">Sign up today!</a>
</div>
<h2>How can non-profits benefit from VolunteerOne?</h2>
<i>Blurb</i>
<ul>
<li>Advertize jobs instantly</li>
<li>Easily schedule and manage volunteer work</li>
</ul>
<?php endif; ?>