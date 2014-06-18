<?php
App::uses('AppController', 'Controller');
class PostsController extends AppController {
	public $components = array('RequestHandler');
	
	public function index() {
		$posts = $this->Post->find('all');
		foreach($posts as $k => $post) {
			$tmpdate = strtotime($post['Post']['start']);
			$posts[$k]['Post']['day'] = date('d',$tmpdate);
			$posts[$k]['Post']['month'] = strtoupper(date('M',$tmpdate));
		}
		$this->set(array(
			'posts' => $posts,
			'_serialize' => array('posts')
		));
	}
	
	public function today() {
		$last = $this->Post->find('first',array(
			'order' => array('Post.start DESC')
		));
		$last_date = $last['Post']['start'];
		$posts = $this->Post->find('all',array(
			'conditions' => array(
				'Post.start' => date('Y-m-d')
			)
		));
		
		if((time() < strtotime($last_date))&&($posts)) {
			$posts = $this->Post->find('all',array(
				'conditions' => array(
					'Post.start' => date('Y-m-d')
				)
			));
		} else {
			$posts = array(
				$last
			);
		}
		foreach($posts as $k => $post) {
			$tmpdate = strtotime($post['Post']['start']);
			$posts[$k]['Post']['day'] = date('d',$tmpdate);
			$posts[$k]['Post']['month'] = strtoupper(date('M',$tmpdate));
		}
		$this->set(array(
			'posts' => $posts,
			'_serialize' => array('posts')
		));
	}
	
	public function admin_index() {
		$posts = $this->paginate();
		$this->set(compact('posts'));
	}
	
	public function admin_add() {
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('The post has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The post could not be saved. Please, try again.','error');
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('The post has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The post could not be saved. Please, try again.','error');
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
	}


	public function admin_delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->Post->delete()) {
			$this->Session->setFlash('Post deleted','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Post was not deleted','error');
		$this->redirect(array('action' => 'index'));
	}
}
?>