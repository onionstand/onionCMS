<p class="pagination-text">Strana <b><?= $pg['currentPage'] ?></b> od <b><?= $pg['allPages'] ?></b></p>
<ul class="pagination">
	<?php if ($pg['firstPage']): ?>
        <li><a href="<?= $BASE, $pg['route'], $pg['prefix'].$pg['firstPage'] ?>">Prva</a></li>
    <?php endif; ?>
	<?php if ($pg['prevPage']): ?>
        <li><a href="<?= $BASE, $pg['route'], $pg['prefix'].$pg['prevPage'] ?>"><i class="material-icons">keyboard_arrow_left</i></a></li>
    <?php endif; ?>
	<?php foreach (($pg['rangePages']?:[]) as $page): ?>
        <li <?= $page == $pg['currentPage'] ? 'class="active"':'' ?>><a href="<?= $BASE, $pg['route'], $pg['prefix'].$page ?>"><?= $page ?></a></li>
	<?php endforeach; ?>
	<?php if ($pg['nextPage']): ?>
        <li><a href="<?= $BASE, $pg['route'], $pg['prefix'].$pg['nextPage'] ?>"><i class="material-icons">keyboard_arrow_right</i></a></li>
    <?php endif; ?>
	<?php if ($pg['lastPage']): ?>
        <li><a href="<?= $BASE, $pg['route'], $pg['prefix'].$pg['lastPage'] ?>">Poslednja [<?= $pg['lastPage'] ?>]</a></li>
    <?php endif; ?>
</ul>
