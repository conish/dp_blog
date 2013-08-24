
        <div class="posts_wrapper">
            <?php foreach($posty as $post):?>
            <div id="<?=$post->id;?>" class="post_wrapper">
                <h2><a href="<?=base_url();?><?=$post->post_url;?>~<?=$post->id;?>.html"><?=$post->tytul;?></a></h2>
                <div class="post_info">Autor <span><?=$post->autor;?> w dniu <?=$post->data_publikacji;?> napisał:</span></div>
                <div class="post_body">
                    <?=$post->tresc;?>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <nav>
            NAWIGACJA
        </nav>
        
        <div class="komentarze_wrapper">
            <?php if(isset($komentarze) && is_array($komentarze)):?>
                <?php foreach($komentarze as $komentarz):?>
            <div class="komentarz" id="komentarz_<?=$komentarz->id;?>">
                <div class="post_info">
                    <?=$komentarz->autor;?> | <?=$komentarz->data;?>
                </div>
                <div class="komentarz_body">
                    <?=$komentarz->tresc;?>
                </div>
            </div>
                <?php endforeach;?>
            <?php else:?>
            <span>Nikt jeszcze nie skomentował tego wpisu. Może chcesz być pierwszym?
            <?php endif;?>
            <div class="form_wrapper">
                <form action="" method="post">
                    <input type="hidden" name="akcja" value="dodaj_komenatarz" />
                    <h3>Dodaj własny komentarz!</h3>
                    <div class="form_row">
                        <label for="autor">Autor</label><input type="text" placeholder="Twój nick" name="autor" id="autor" />
                    </div>
                    <div class="form_row">
                        <textarea cols="20" rows="5" name="komentarz_tresc" placeholder="Co chciałeś powiedzieć?"></textarea>
                    </div>
                    <div class="form_row">
                        <input type="submit" value="wyślij" />
                    </div>
                </form>
                
            </div>
        </div>
        <footer>
            <?=$konfiguracja['footer'];?>
        </footer>
    </body>
</html>
