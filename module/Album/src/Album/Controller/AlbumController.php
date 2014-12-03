<?php

namespace Album\Controller;

use Album\Model\AlbumTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\Album;
use Album\Form\AlbumForm;

class AlbumController extends AbstractActionController
{

    protected $albumTable;

    public function indexAction()
    {
        return new ViewModel(array(
            'albuns' => $this->getAlbumTable()->fetchAll()
        ));
    }

    public function addAction()
    {
        $form = new AlbumForm();
        $form->get('submit')->setValue('Cadastrar');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $album = new Album();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $album->exchangeArray($form->getData());
                $this->getAlbumTable()->saveAlbum($album);

                // redirect to list of albums
                return $this->redirect()->toRoute('album');
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {

    }

    public function deleteAction()
    {

    }

    public function getAlbumTable()
    {
        if (!$this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('Album\Model\AlbumTable');
        }
        return $this->albumTable;
    }
}