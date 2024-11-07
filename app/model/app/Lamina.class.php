<?php


class Lamina extends TRecord
{
    const TABLENAME  = 'lamina';
    const PRIMARYKEY = 'id';
    const IDPOLICY   = 'max'; // {max, serial}
    

    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('nome');

        parent::addAttribute('neutrofilo_relativo');
        parent::addAttribute('monocito_relativo');
        parent::addAttribute('eosilofilo_relativo');
        parent::addAttribute('basofilo_relativo');
        parent::addAttribute('linfocito_t_relativo');
        parent::addAttribute('linfocito_a_relativo');
        parent::addAttribute('blastos_relativo');

        parent::addAttribute('imagem');

        parent::addAttribute('neutrofilo_absoluto');
        parent::addAttribute('monocito_absoluto');
        parent::addAttribute('eosilofilo_absoluto');
        parent::addAttribute('basofilo_absoluto');
        parent::addAttribute('linfocito_t_absoluto');
        parent::addAttribute('linfocito_a_absoluto');
        parent::addAttribute('blastos_absoluto');

        parent::addAttribute('hemacias');
        parent::addAttribute('hemoglobina');
        parent::addAttribute('hematocrito');
        parent::addAttribute('volume_corp_medio');
        parent::addAttribute('hemoglobina_corp_medio');
        parent::addAttribute('concentracao_hemoglobina');
        parent::addAttribute('rdw');
        parent::addAttribute('plaquetas');



    }
    
    // public function get_laudo($laudo_id)
    // {
        
    // }
    
}
