<?php
include ('./sqlitedb.php');	
?>

<?php
$user = $_POST["user"];

try {
	$itemQuery = 'select sellerID, rating, description, Item.location, Item.country, started, ends from Item NATURAL JOIN Seller where itemID = '. $_POST["itemID"];	

	$itemResult = $db->query($itemQuery);
	$item = $itemResult->fetch();

	echo '<p><strong>Seller </strong> '.$item["sellerID"].'<strong>    Rating</strong>  '. $item["rating"] .'</p>';
	echo '<p><strong>Description  </strong> '.$item["description"].'</p>';
	echo '<p><strong>Started  </strong>'.$item["started"].'</p>';
	echo '<p><strong>Ends on  </strong>'.$item["ends"].'</p>';
} catch (PDOException $e) {
	echo "Bid item query failed: " . $e->getMessage();
}
?>
<div id="history-table"></div>
<script type="text/javascript">
	$('#history-table').load('history-table.php', { "itemID" : <?php echo $_POST["itemID"] ?>, "numBids" : <?php echo $_POST["numBids"]?>})
</script>