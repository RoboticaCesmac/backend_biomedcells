<?php


class Sobre extends TRecord
{
    const TABLENAME  = 'sobre';
    const PRIMARYKEY = 'id';
    const IDPOLICY   = 'max'; // {max, serial}
    

    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('text');

    }
    
}
