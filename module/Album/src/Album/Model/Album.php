<?php

namespace Album\Model;

class Album
{
    public $id;
    public $artista;
    public $titulo;

    public function exchangeArray($data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->artista = (!empty($data['artista'])) ? $data['artista'] : null;
        $this->titulo = (!empty($data['titulo'])) ? $data['titulo'] : null;
    }

}