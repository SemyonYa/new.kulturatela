<div class="cab-lesson-list">
    <h2>Развитие гибкости</h2>
    <div class="cab-lesson-items">
        <div class="cab-lesson-item">Техника безопасности</div>
        <div class="cab-lesson-item">Разминка</div>
    </div>
    <hr>
    <div class="cab-lesson-items">
        <?php foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9] as $i) : ?>
            <a href="/cab/lesson?id=<?= $i ?>">
                <div class="cab-lesson-item">Урок № <?= $i ?></div>
            </a>
        <?php endforeach; ?>
    </div>
</div>