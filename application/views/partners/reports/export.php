<?php foreach($spots as $spot): ?>
<?php echo $spot->name ?>售出<?php echo $spot->ticket_counts ?>张
<?php endforeach ?>
手册id, 购买人, 购买时间, 剩余张数
<?php foreach ($tickets as $ticket): ?>
<?php echo $ticket->handbook_unique_id.','.$ticket->user->mobile.','.$ticket->created_at.','.(3 - $ticket->count) ?>
<?php endforeach ?>