<h1>{$who} sign up</h1>

<div class="login wizard">
<div class="login wizard step">
Step {$step}: {$description}
</div>

<div class="login wizard form">
{include file=tools/formgen.tpl}
</div>

<div class="login wizard help">
{if $step < $laststep}
Click save to go to the next step...
{else}
Click save to save your application.
{/if}
</div>

</div>
