<div style="" class="zaslepka">
    <div id="register_dialog" title="Zaloguj się!" class="dialogs">
        <label for="login">Login</label><br /><input type="text" value="" placeholder="Login..." id="login_reg" /><br />
        <label for="pass">Hasło</label><br /><input type="password" id="pass_reg" placeholder="Hasło..." /><br />
        <label for="pass_c">Potwierdź hasło</label><br /><input type="password" id="pass_c" placeholder="Potwierdź hasło..." /><br />
        <button id="submit_reg">Zaloguj!</button>
    </div>
</div>
<script>
    $("#submit_reg").click(function(event) {
        
        console.log("klika sie!");
        event.preventDefault();
        console.log($("#pass_reg").val());
        console.log($("#pass_c").val());
        if($("#pass_reg").val() != $("#pass_c").val())
        {
            alert("Hasła nie są takie same!");
            return;
        }
        $.post(
                '<?=base_url();?>register',
                {
                    'login': $("#login_reg").val(),
                    'pass': $("#pass_reg").val(),
                    'pass_c': $("#pass_c").val()
                },
                function(data)
                {
                    if(data.status == 'ok')
                        {
                            console.log('ok');
                            //window.location.reload(); 
                        }
                    else
                        {
                            alert(data.message);
                        }   
                }
        
        );
    });
</script>