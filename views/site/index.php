<?php
$this->title = 'Культура тела';
?>
<div class="start-wrap">
    <header>
        <div class="logo"></div>
        <div class="menu">
            <div class="menu-item active" data-link="#first" onclick="selectMenuItem(event)"><span class="glyphicon glyphicon-home" data-link="#first"></span></div>
            <div class="menu-item" data-link="#second" onclick="selectMenuItem(event)">О проекте</div>
            <div class="menu-item" data-link="#third" onclick="selectMenuItem(event)">Преимущества</div>
            <div class="menu-item" data-link="#fourth" onclick="selectMenuItem(event)">Результаты</div>
            <div class="menu-item" data-link="#fifth" onclick="selectMenuItem(event)">Курсы</div>
            <div class="menu-item" data-link="#sixth" onclick="selectMenuItem(event)">Частые вопросы</div>
            <div class="menu-item" data-link="#seventh" onclick="selectMenuItem(event)">Бесплатно</div>
        </div>
        <div class="menu-mobile-btn" onclick="showMenuMobile()"></div>
        <a href="/cab" class="to-online">
            <div>
                Личный <br> кабинет
            </div>
        </a>
    </header>
    <div class="menu-mobile-back" onclick="hideMenuMobile()"></div>
    <div class="menu-mobile">
        <div class="menu-mobile-title">Меню</div>
        <div class="menu-mobile-item active" data-link="#first" onclick="selectMenuMobileItem(event)">О проекте</div>
        <div class="menu-mobile-item" data-link="#second" onclick="selectMenuMobileItem(event)">Преимущества</div>
        <div class="menu-mobile-item" data-link="#third" onclick="selectMenuMobileItem(event)">Результаты</div>
        <div class="menu-mobile-item" data-link="#fourth" onclick="selectMenuMobileItem(event)">Курсы</div>
        <div class="menu-mobile-item" data-link="#fifth" onclick="selectMenuMobileItem(event)">Частые вопросы</div>
        <div class="menu-mobile-item" data-link="#sixth" onclick="selectMenuMobileItem(event)">Контакты</div>
    </div>
    <div id="first" class="screen first">
        <h1><?= $title->title ?></h1>
        <h3><?= $title->subtitle ?></h3>
    </div>

    <div id="second" class="screen second">
        <h2><?= $about->title ?></h2>
        <div class="second-inner">
            <div class="second-img"></div>
            <div class="second-text">
                <h5><?= $about->subtitle ?></h5>
                <?php foreach ($about_items as $i) : ?>
                    <p><?= $i->subtitle ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="screen second-2">
        <h3><?= $about_fit->title ?></h3>
        <p><?= nl2br($about_fit->subtitle) ?></p>
    </div>

    <div id="third" class="screen third">
        <h2><?= nl2br($adv->subtitle) ?></h2>
        <div class="third-inner">
            <?php foreach ($adv_items as $i) : ?>
                <div class="third-inner-item" style="background-image: url('/web/img/<?= $i->svg ?>.svg');"><?= $i->subtitle ?></div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="fourth" class="screen fours">
        <h2><?= nl2br($result->subtitle) ?></h2>
        <div class="fours-inner">
            <div class="fours-text">
                <?= nl2br($result->description) ?>
            </div>
            <div class="fours-imgs">
                <div class="fours-imgs-item" style="background-image: url('/web/img/fours-01.jpg');"></div>
                <div class="fours-imgs-item" style="background-image: url('/web/img/fours-05.jpg');"></div>
                <div class="fours-imgs-item" style="background-image: url('/web/img/fours-04.jpg');"></div>
                <div class="fours-imgs-item" style="background-image: url('/web/img/fours-02.jpg');"></div>
            </div>
        </div>
    </div>
    <div id="fifth" class="screen fifth">
        <h2>Курсы</h2>
        <div class="fifth-inner">
            <div class="fifth-icons">
                <?php foreach ($progs as $prog) : ?>
                    <div class="fifth-icons-item <?= $prog->id == 1 ? 'active' : '' ?>" data-id="<?= $prog->id ?>" onclick="selectCourse(event)">
                        <?= $prog->name ?>
                    </div>
                <?php endforeach;  ?>
            </div>
            <?php foreach ($progs as $prog) : ?>
                <div data-id="<?= $prog->id ?>" class="fifth-description <?= $prog->id == 1 ? 'active' : '' ?>">
                    <p><?= nl2br($prog->description) ?></p>
                    <div class="fifth-buy">
                        <button class="buy" onclick="buy(<?= $prog->id ?>)">Купить</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="sixth" class="screen sixth">
        <h2>Частые вопросы</h2>
        <div class="sixth-inner">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php foreach ($qs as $q) : ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading<?= $q->id ?>">
                            <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $q->id ?>" aria-expanded="false" aria-controls="collapse<?= $q->id ?>">
                                <?= $q->name ?>
                            </h4>
                        </div>
                        <div id="collapse<?= $q->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $q->id ?>">
                            <div class="panel-body">
                                <?= $q->description ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div id="seventh" class="seventh screen">
        <h2><?= $free->subtitle ?></h2>
        <div class="seventh-inner">
            <div class="seventh-inner-text"><?= nl2br($free->description) ?></div>
            <div class="seventh-inner-videos">
                <div class="seventh-inner-videos-item"></div>
                <div class="seventh-inner-videos-item"></div>
            </div>
            <div class="seventh-inner-yt">
                Мой YT канал <img src="/web/img/youtube.svg" alt="">
            </div>
        </div>
    </div>
    <footer>
        <p>
            <div class="footer-logo"></div>
        </p>
        <p><a href="mailto:info@kulturatela.online">info@kulturatela.online</a></p>
        <address>Н. Новгород, Ванеева, 13</address>
        <div class="links">
            <a href="https://instagram.com">
                <div class="links-item insta"></div>
            </a>
            <a href="https://vk.com">
                <div class="links-item vk"></div>
            </a>
        </div>
    </footer>
</div>