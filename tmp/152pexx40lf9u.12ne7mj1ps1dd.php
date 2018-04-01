<p class="pagination-text">Strana <b><?= ($pg['currentPage']) ?></b> od <b><?= ($pg['allPages']) ?></b></p>
<ul class="pagination">
    <?php if ($pg['firstPage']): ?>
        <li><a href="<?= ($BASE.$pg['route'].$pg['prefix'].$pg['firstPage']) ?>">First</a></li>
    <?php endif; ?>
    <?php if ($pg['prevPage']): ?>
        <li><a href="<?= ($BASE.$pg['route'].$pg['prefix'].$pg['prevPage']) ?>"><i class="glyphicon glyphicon-chevron-left"></i></a></li>
    <?php endif; ?>
    <?php foreach (($pg['rangePages']?:[]) as $page): ?>
        <li <?= ($page == $pg['currentPage'] ? 'class="active"':'') ?>><a href="<?= ($BASE.$pg['route'].$pg['prefix'].$page) ?>"><?= ($page) ?></a></li>
    <?php endforeach; ?>
    <?php if ($pg['nextPage']): ?>
        <li><a href="<?= ($BASE.$pg['route'].$pg['prefix'].$pg['nextPage']) ?>"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
    <?php endif; ?>
    <?php if ($pg['lastPage']): ?>
        <li><a href="<?= ($BASE.$pg['route'].$pg['prefix'].$pg['lastPage']) ?>">Last [<?= ($pg['lastPage']) ?>]</a></li>
    <?php endif; ?>
</ul>