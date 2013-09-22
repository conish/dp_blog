        <div class="all_tekst_wrapper">
            <ul>
                <?php foreach($posty as $post): ?>
                <li><a href="<?=base_url();?>teksty/edit/<?=$post->id;?>"><?=$post->tytul;?></a> (autor: <?=$post->autor;?>, data dodania: <?=$post->data_dodania;?>, data publikacji: <?=$post->data_publikacji;?>)</li>
                <?php endforeach;?>
            </ul>
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
