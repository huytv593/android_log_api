<?php
App::uses('AppController', 'Controller');
/**
 * Contacts Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 */
class ContactsController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function api_put()
    {
        $this->autoRender = $this->autoLayout = false;
        if ($this->request->is('post')) {
            $response = array();
            $deviceID = $this->request->data['deviceID'];
            $result = $this->request->data['contact'];
            $resulttmp = json_decode($result, JSON_UNESCAPED_UNICODE);
            $resulta = $resulttmp['contact'];
            if (empty($result)) {
                $response['state'] = 'done!';
            } else {
                $this->Contact->deleteAll(array('Contact.device_id' => $deviceID, false));
                foreach ($resulta as $value) {
                    if ($this->Contact->saveAll(array(
                        'device_id' => $deviceID,
                        'name' => $value['name'],
                        'number' => $value['number']
                    ))
                    ) {
                        $response["state"] = 'done';
                    } else {
                        $response["state"] = 'error';
                    }
                }
            }
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        };
    }

    /**
     * index method
     *
     * @return void
     */
    public function index($id = null){
        $this->set('contacts', $this->Paginator->paginate(
            'Contact',
            array('Contact.device_id' => $id)
        ));
        $data['deviceId'] = $id;
        $this->set('data', $data);
    }
}