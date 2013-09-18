<?php

global $EM_Event;

$title = $EM_Event->event_name;

$start_date = mysql2date("j. F Y", $EM_Event->event_start_date, true);
$start_time = mysql2date("H:i", $EM_Event->event_start_time, true);
$end_date = mysql2date("j. F Y", $EM_Event->event_end_date, true);
$end_time = mysql2date("H:i", $EM_Event->event_end_time, true);

$categories = array();
foreach($EM_Event->get_categories() as $cat) {
	$categories[] = $cat->name;	
}

$description = $EM_Event->post_content;

?>

<div class="event_listelement event_clubtermine">
	<div class="event_head"><?php echo $title; ?></div>
	<div>
		<span class="event_dates">Beginn:</span>
		<span class="event_times">
			<?php echo $start_date . ", " . $start_time; ?> Uhr
		</span>
	</div>
	<div>
		<span class="event_dates">Ende:</span>
		<span class="event_times">
			<?php echo $end_date . ", " . $end_time; ?> Uhr
		</span>
	</div>
	<div class="event_text">
		<p><?php echo (count($categories)<=1)?"Kategorie":"Kategorien";?>: <?php echo join(", ", $categories); ?></p>
	</div>
</div>

<div class="text-tile">
	<p><?php echo nl2br($description); ?>
</div>
