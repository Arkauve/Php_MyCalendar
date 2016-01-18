<?php
session_start();
if(empty($_SESSION['user'])){
	header('Location: index.php');
	exit();
}
$Mail=$_SESSION['user'];
require ("Date.php");
$events = getEvents ( $num_an, $Mail );
?>

<!DOCTYPE html>
<html>
<head>
<title>Calendrier</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<table>

		<thead>
			<tr>
				<th><img src="fleche_precedent.png"
					onclick=" location.href='Calendrier.php?mois=<?php echo $num_mois-1; ?>&amp;annee=<?php echo $num_an; ?>'" /></th>
				<th colspan="3" class="date" colspan="7"><?php echo $tab_mois[$num_mois]." ".$num_an;  ?></th>
				<th><img src="fleche_suivant.png"
					onclick=" location.href='Calendrier.php?mois=<?php echo $num_mois+1; ?>&amp;annee=<?php echo $num_an; ?>'" /></th>
				<th></th>
				<th></th>
			</tr>
		<?php
		echo '<tr class="semaine">';
		for($i = 1; $i <= 7; $i ++) {
			echo ('<th>' . $tab_jours [$i] . '</th>');
		}
		echo '</tr>';
		?>
	</thead>
	<?php
	for($i = 0; $i < 5; $i ++):
		?>
		<tr>
		<?php for($j=0;$j<7;$j++): ?>
			<?php $day=$tab_cal[$i][$j]; $time=formatTime($num_an,$num_mois,$day);  ?>
			<?php if(strpos($tab_cal[$i][$j],"*")!==false){?> 
			<td class="nonMois" >
				<div class="padding">
					<?php $day=str_replace("*","",$tab_cal[$i][$j]); echo $day; ?></div>
			<?php } 
			else { ?>
				<td onclick="location.href='EnregistrerEvents.php?date=<?php echo $time ?>'" <?php  if($time == date('Y-m-d')) : ?> class="today"
					<?php endif; ?> >
					<div class="jour">
					<?php  echo $tab_cal[$i][$j]; ?></div>
					<div class="titreJour">
	                	<?php echo $tab_jours[$j+1] ?> <?php echo $day; ?>  <?php echo $tab_mois[$num_mois]; ?>
					</div>
	                   	<?php foreach($events as $e): if($e['DATE']==$time): ?>
	                  	<ul>
	                   		<li class="point"></li>
	                   	</ul>	
						<ul class="events" >
							<li class="Titre"><?php  echo $e['Nom']." ".substr($e['HeureD'],0,5)."-".substr($e['HeureF'],0,5); ?></li>
							<li class="description">
		                		<?php echo $e['Description']; ?>
							</li>
						</ul>
						<?php  endif;  endforeach;?>
					
				</td>
			<?php } 
		endfor; ?>
		</tr>
	<?php endfor; ?>
</table>
</body>
</html>