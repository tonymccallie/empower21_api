<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Edit Post
		<div class="btn-group pull-right">
			<?php echo $this->Html->link('<i class="icon-trash"></i>', array('action' => 'delete', $this->data['Post']['id']), array('escape'=>false,'class'=>'btn'),'Are you sure you want to delete this Post'); ?>
		</div>
	</h3>
</div>
<div class="">
	<?php
		echo $this->Form->create();
			echo $this->Form->input('id',array('class'=>'span12'));
			echo $this->Form->input('title',array('class'=>'span12'));
			echo $this->Form->input('start',array('class'=>'span4'));
			echo $this->Form->input('verse',array('class'=>'span12'));
			echo $this->Form->input('reference',array('class'=>'span12'));
			echo $this->Form->input('prayer',array('class'=>'span12'));
		echo $this->Form->end(array('label'=>'Add Post','class'=>'btn'));
	?>
</div>