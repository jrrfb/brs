  <?php
            class AlertasController extends AppController {
                function index() {
		 $this->Alerta->recursive = 0;
		 $this->set('alertas', $this->paginate());
	       }
               
               	function add() {
		if (!empty($this->data)) {
			$this->Alerta->create();
			if ($this->Alerta->save($this->data)) {
				$this->Session->setFlash(__('The destaque has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The destaque could not be saved. Please, try again.'));
			}
		}
	}
        
        function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid destaque'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Alerta->save($this->data)) {
				$this->Session->setFlash(__('The destaque has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The destaque could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Alerta->read(null, $id);
		}
	}

            }