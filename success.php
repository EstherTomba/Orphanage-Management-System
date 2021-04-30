<?php if (isset($_SESSION['success'])) : ?>
	<div class="error success" >
		<h3 style="font-size:15px">
			<?php 
				echo $_SESSION['success']; 
				unset($_SESSION['success']);
			?>
		</h3>
	</div>
<?php endif ?>