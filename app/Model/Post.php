<?php
App::uses('AppModel', 'Model');
class Post extends AppModel {
	var $order = array('Post.start' => 'desc');

	
}
?>