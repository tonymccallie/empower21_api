<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Add Post
	</h3>
</div>
<div class="">
	<?php
		echo $this->Form->create();
			echo $this->Form->input('title',array('class'=>'span12'));
			echo $this->Form->input('start',array('class'=>'span4'));
			echo $this->Form->input('verse',array('class'=>'span12'));
			echo $this->Form->input('reference',array('class'=>'span12'));
			echo $this->Form->input('prayer',array('class'=>'span12'));
		echo $this->Form->end(array('label'=>'Add Post','class'=>'btn'));
	?>
</div>