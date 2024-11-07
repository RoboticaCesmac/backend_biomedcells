<?php


class Celula extends TRecord
{
    const TABLENAME  = 'celula';
    const PRIMARYKEY = 'id';
    const IDPOLICY   = 'max'; // {max, serial}
    

    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('nome');
        parent::addAttribute('imagem');
        parent::addAttribute('descricao');

    }
    
}
