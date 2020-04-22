<?php if (!empty($_SESSION['flash'])) : ?>
	<?php foreach ($_SESSION['flash'] as $type => $msg) : ?>
		<div class="container my-3 mx-auto alert alert-<?= $type ?>">
			<strong><?= $msg ?></strong>
		</div>
	<?php endforeach; ?>
	<?php unset($_SESSION['flash']); ?>
<?php endif; ?>