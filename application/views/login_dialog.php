<div style="" class="zaslepka">
    <div id="login_dialog" title="Zaloguj się!" class="dialogs">
        <p id="error_message_login" style="display: none;"></p>
        <label for="login">Login</label><br /><input type="text" value="" placeholder="Login..." id="username" /><br />
        <label for="pass">Hasło</label><br /><input type="password" id="pass" placeholder="Hasło..." /><br />
        <button id="submit_login">Zaloguj!</button>
    </div>
</div>

<script>
    $("#submit_login").click(function(event){
        event.preventDefault();
        $.post('<?=base_url();?>login',
        {
            'login' : $("#username").val(),
            'pass' : $("#pass").val()
        },
        function(data)
        {
            if(data.status == 'ok')
                {
                    window.location.reload();
                }
            else
                {
                    $("#error_message_login").empty().html(data.message).show().fadeOut(2000, function() { $(this).hide();});
                    
                }
        }
        )
    });
</script>