{if !$input and $ldata.details}
{assign var=input value=$ldata.details}
{/if}

{include file=tools/formgen.tpl}
