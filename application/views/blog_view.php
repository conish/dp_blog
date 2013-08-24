
        <div class="posts_wrapper">
            <?php foreach($posty as $post):?>
            <div id="<?=$post->id;?>" class="post_wrapper">
                <h2><a href="<?=base_url();?><?=$post->post_url;?>~<?=$post->id;?>.html"><?=$post->tytul;?></a></h2>
                <div class="post_info">Autor <span><?=$post->autor;?> w dniu <?=$post->data_publikacji;?> napisał:</span></div>
                <div class="post_body">
                    <?=$post->lead;?> <a href="<?=base_url();?><?=$post->post_url;?>~<?=$post->id;?>.html">(więcej...)</a>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <nav>
            NAWIGACJA
            <div class="paginacja_wrapper">
                <?=$konfiguracja['paginacja'];?>
            </div>
        </nav>
        <footer>
            <?=$konfiguracja['footer'];?>
        </footer>
    </body>
</html>
