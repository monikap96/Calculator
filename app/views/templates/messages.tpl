<div class="messages error">
{if $messages->isError()} 
    <ol class="text-danger" data-aos="fade-up">
    {foreach  $messages->getErrors() as $error}
    {strip}
            <li>{$error}</li>
    {/strip}
    {/foreach}
    </ol>
{/if}
</div>

<div class="messages info bottom-margin text-warning aos-init aos-animate">
    {foreach  $messages->getInfos() as $info}
    {strip}
            <span>{$info}</span>
    {/strip}
    {/foreach}
    </ol>
</div>

