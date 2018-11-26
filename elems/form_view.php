<div class="view_ingridients">
	<div class="view_title">
		<span><?php echo $name ?></span>
	</div>

	<div class="view_text">
		<span><?php echo $description ?></span>
	</div>

	<div class="view_ingridients">
		<span class="title_ingridients">Ингредиенты</span>
		<?php
			$product = explode('|', $product);
			$productQuantity = explode('|', $productQuantity);
			$newArr = (array_combine($product, $productQuantity));
			foreach ($newArr as $key => $value) {
				echo '<div class="ingridients">
					<span>'.$key.'</span>
					<span>'.$value.'</span>
				</div>';
			}
		?>
	</div>
</div>