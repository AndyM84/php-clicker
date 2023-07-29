<html>
	<head>
		<title>My Clicker</title>
	</head>

	<body>
		<?php if (isset($msg)): ?><div style="color: red"><?=$msg?></div><?php endif; ?>

		<form method="post" action="index.php">
			<?php if (!isset($user)): ?>			<input type="hidden" name="action" value="capture" />
			<button type="submit">My Turn</button>
<?php else: ?>			<input type="hidden" name="action" value="increment" />
			<button type="submit">Click Me!</button>
<?php endif; ?>
		</form>
	</body>
</html>