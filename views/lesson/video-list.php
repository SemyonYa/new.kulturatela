<h4>Выбор видео-файла</h4>
<ul class="admin-video-list">
    <?php foreach ($list as $item) : ?>
        <li onclick="setVideoForLesson('<?= $item ?>')"><?= $item ?></li>
    <?php endforeach; ?>
</ul>