<div id="log_tab_wrapper">
    Witaj <?=$name;?>!
    <span class="pause">|</span>
    <?php if($is_logged):?>
    <span class="menu">Menu</span>
    <span class="pause">|</span>
    <a href="<?=base_url();?>logout">Wyloguj!</a>
    <?php else:?>
    <a href="#" id="login">Zaloguj się!</a>
    <span class="pause">|</span>
    <a href="#" id="register">Nie masz konta?</a>
    <?php endif;?>
</div>
<div id="logged_menu">
    <div>
        <ul class="menu_content">
            <li><a href="<?=base_url();?>me">Mój profil</a></li>
            <?php if($level > 1): ?>
            <li><a href="<?=base_url();?>teksty">Moje teksty</a></li>
            <li><a href="<?=base_url();?>teksty/add">Dodaj tekst</a></li>
            <?php endif;?>
            <?php if($level > 2):?>
            <li><a href="<?=base_url();?>teksty/all">Zarządzaj tekstami</a></li>
            <li><a href="<?=base_url();?>users">Zarządzaj użytkownikami</a></li>
            <?php endif;?>
        </ul>
    </div>
</div>