<div id="block-category">
	<p class="header-title">Каталог</p>
	<ul>
		<li><a id="index1">Гитары
			<ul class="category-section">
	<?php
		$result = mysqli_query($link,"SELECT * FROM category WHERE type='guitar'");

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			do {
				echo '
				<li><a href="view_cat.php?cat='.$row["brand"].'&type='.$row["type"].'">'.$row["brand"].'</a></li>
				';
			}
			while ($row = mysqli_fetch_array($result)); 
		}
	?>
			</ul>
		</a></li>

		<li><a id="index2">Клавишные инструменты
			<ul class="category-section">
	<?php
		$result = mysqli_query($link,"SELECT * FROM category WHERE type='piano'");

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			do {
				echo '
				<li><a href="view_cat.php?cat='.$row["brand"].'&type='.$row["type"].'">'.$row["brand"].'</a></li>
				';
			}
			while ($row = mysqli_fetch_array($result)); 
		}
	?>
			</ul>
		</a></li>

		<li><a id="index3">Ударные инструменты
			<ul class="category-section">
	<?php
		$result = mysqli_query($link,"SELECT * FROM category WHERE type='percussion'");

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			do {
				echo '
				<li><a href="view_cat.php?cat='.$row["brand"].'&type='.$row["type"].'">'.$row["brand"].'</a></li>
				';
			}
			while ($row = mysqli_fetch_array($result)); 
		}
	?>
			</ul>
		</a></li>

		<li><a id="index4">Духовые инструменты
			<ul class="category-section">
	<?php
		$result = mysqli_query($link,"SELECT * FROM category WHERE type='vent'");

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			do {
				echo '
				<li><a href="view_cat.php?cat='.$row["brand"].'&type='.$row["type"].'">'.$row["brand"].'</a></li>
				';
			}
			while ($row = mysqli_fetch_array($result)); 
		}
	?>
			</ul>
		</a></li>

		<li><a id="index5">Народные инструменты
			<ul class="category-section">
	<?php
		$result = mysqli_query($link,"SELECT * FROM category WHERE type='folk'");

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			do {
				echo '
				<li><a href="view_cat.php?cat='.$row["brand"].'&type='.$row["type"].'">'.$row["brand"].'</a></li>
				';
			}
			while ($row = mysqli_fetch_array($result)); 
		}
	?>
			</ul>
		</a></li>

		<li><a id="index6">Струнные инструменты
			<ul class="category-section">
	<?php
		$result = mysqli_query($link,"SELECT * FROM category WHERE type='stringed'");

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			do {
				echo '
				<li><a href="view_cat.php?cat='.$row["brand"].'&type='.$row["type"].'">'.$row["brand"].'</a></li>
				';
			}
			while ($row = mysqli_fetch_array($result)); 
		}
	?>
			</ul>
		</a></li>

	</ul>
</div>