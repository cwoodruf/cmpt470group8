{if $ldata.user_type == 'volunteer' or $ldata.user_type == 'organization' or $ldata.user_type == 'admin'}
	{assign var=editor value=true}
{/if}

<div class="menu">
<div class="menuitem">
{include file=searchform.tpl}
</div>
<div class="menuend"></div>

{if $editor}
<div class="menuitem">
<span class="loginemail">{$ldata.email}:</span>
</div>
<div class="menuitem">
<a href="?action={$ldata.user_type}">{$ldata.user_type|capitalize} dashboard</a>
</div>
{else}
<div class="menuitem">
<a href="?">Home</a>
</div>
<div class="menuitem">
<a href="?action=organization">Organizations</a>
</div>
<div class="menuitem">
<a href="?action=volunteer">Volunteers</a>
</div>
<div class="menuitem">
<a href="?action=search&amp;search=&amp;region=&amp;newsearch=true">Browse Jobs</a> 
</div>

{/if}

<div class="menuitem">
{if $ldata}
<a href="?action=logout" >Log out</a>
{else}
<a href="javascript: void(0);" id="login_link" >Log in</a>
<div id="login_form" >
{include file=tools/loginajaxform.tpl}
    <div class="login-input">
    <span class="ename"> Email  </span>
    <input type="text" name="login" class="input_box1"/>
    </div>

    <div class="login-input">
    <span class="pname"> Password  </span>
    <input type="password" name="password" class="input_box2" />
    </div>

    <div class="login-input">
    <a href="?action=password/recover">Forgot Password?</a> &nbsp;&nbsp;
    <a href="javascript: void(0);" onclick="$('#login_form').hide(); return false;">Close</a>
    <input type="submit" name="submit" value="Log In" class="login_button" />
    </div>
</form>
</div>
{/if}
</div>

</div>
<div class="menuend"></div>
