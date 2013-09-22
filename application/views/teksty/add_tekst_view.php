        <div class="actions_wrapper">
            <button id="zapisz">Zapisz</button>
            <button id="podglad" <?php if(!isset($post_id)): ?> disabled="disabled" <?php endif;?> >Podgląd</button>
            <button id="publikuj" <?php if(!isset($post_id)): ?> disabled="disabled" <?php endif;?> >Publikuj</button>
            <button id="cofnij" <?php if(!isset($post_id)): ?> disabled="disabled" <?php endif;?> >Wycofaj</button>
        </div>
        <form action="<?=base_url();?>teksty/save" method="post">
            <input type="text" value="<?php if(isset($post_id)): echo $post_id; endif;?>" name="post_id" id="post_id" id="save_tekst_form"/>
            <div class="add_tekst_wrapper">
                <div class="title_wrapper">
                    <h2><label for="title">Tytuł</label></h2>
                    <input type="text" value="<?php if(isset($post[0]->tytul)):?><?=$post[0]->tytul;?><?php endif;?>" placeholder="Tytuł" name="title" id="title" />
                </div>
                <div class="text_tools">
                    <ul>
                        <li>Italic</li>
                        <li>Bold</li>
                        <li>Underline</li>
                        <li>H2</li>
                        <li>H3</li>
                        <li>Link</li>
                    </ul>
                </div>
                <div class="lead_wrapper">
                    <h2>Lead</h2>
                    <textarea name="lead" cols="20" rows="2" placeholder="Treść bloga"><?php if(isset($post[0]->lead)):?><?=$post[0]->lead;?><?php endif;?></textarea>
                </div>
                <div class="body_wrapper">
                    <h2>Treść</h2>
                    <textarea name="tresc" cols="20" rows="2" placeholder="Treść bloga"><?php if(isset($post[0]->tresc)):?><?=$post[0]->tresc;?><?php endif;?></textarea>
                </div>
            </div>
        </form>
        <nav>
            NAWIGACJA
            <div class="paginacja_wrapper">
                <?=$konfiguracja['paginacja'];?>
            </div>
        </nav>
        <footer>
            <?=$konfiguracja['footer'];?>
        </footer>
<script>
    $("#zapisz").button().click(function() { document.forms[0].submit() });
</script>
    </body>
</html>
