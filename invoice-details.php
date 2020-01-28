<?php
	if(!isset($_GET['invoice'])){
		header('Location: index.php');
		exit();
	}

	$pdo = new PDO('sqlite:chinook.db');
	$sql = '
			SELET * FROM invoice_items
			WHERE InvoiceID = ?
	';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(1, $_GET['invoice']);
	$statement->execute();
	$invoiceItems = $statement->fetchAll(PDO::FETCH_OBJ);

	var_dump($invoiceItems);

?>

