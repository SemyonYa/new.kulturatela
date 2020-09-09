<div class="cab-articles">
    <h2>Статьи</h2>
    <div class="cab-articles-items">
        <?php foreach ([1, 2, 3, 4, 5] as $i) : ?>
            <a href="/cab/article?id=<?= $i ?>">
                <div class="cab-articles-item">
                    <div class="cab-articles-item-img" style="background-image: url('/web/img/fours-0<?= $i ?>.jpg');"></div>
                    <div class="cab-articles-item-text">
                        <h5>Статья № <?= $i ?></h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, aliquid.</p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>