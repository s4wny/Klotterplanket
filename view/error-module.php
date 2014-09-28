<?php if(isset($errors)) : ?>
	<ul class="errors">
		<?php foreach($errors as $error): ?>
			<li><?= $error ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>