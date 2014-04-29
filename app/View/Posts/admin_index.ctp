<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Posts
		<div class="btn-group pull-right">
			<?php echo $this->Html->link('Add Post', array('action' => 'add'),array('class'=>'btn','escape'=>false)); ?>
		</div>
	</h3>
</div>
<div class="">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>
					<?php echo $this->Paginator->sort('title','<i class="icon-sort"></i> Title',array('escape'=>false)); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('start','<i class="icon-sort"></i> Date',array('escape'=>false)) ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($posts as $post): ?>
			<tr>
				<td>
					<?php echo $this->Html->link($post['Post']['title'],array('action'=>'edit',$post['Post']['id'])) ?>
				</td>
				<td>
					<?php echo date('m/d/Y',strtotime($post['Post']['start'])) ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<?php echo $this->element('paging') ?>
</div>