<?php

namespace Album\Form;

use Zend\Form\Form;

class AlbumForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('album');

        $id = array(
            'name' => 'id',
            'type' => 'hidden'
        );

        $titulo = array(
            'name'      => 'titulo',
            'type'      => 'Text',
            'options'   => array(
                'label' => 'Titulo'
            )
        );

        $artista = array(
            'name'      => 'artista',
            'type'      => 'Text',
            'options'   => array(
                'label' => 'Artista'
            )
        );

        $submit = array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Cadastrar',
                'id'    => 'submitbutton'
            )
        );

        $this->add($id);
        $this->add($titulo);
        $this->add($artista);
        $this->add($submit);
    }
}