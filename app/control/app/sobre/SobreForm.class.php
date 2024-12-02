<?php

class SobreForm extends TPage
{
    protected $form; 
    const FORM_NAME = 'form_Sobre';
    

    public function __construct( $param )
    {
        parent::__construct();
  
        // creates the form
        $this->form = new BootstrapFormBuilder(self::FORM_NAME);
        $this->form->setFormTitle('<i class="fas fa-pencil-alt fa-fw"></i> Sobre');
        $this->form->setFieldSizes('100%');

        // create the form fields
        $id    = new THidden('id');
        $text  = new TText('text');

        // add the fields
        $row = $this->form->addField($id);

        $row = $this->form->addFields( [ new TLabel('Texto') , $text ] )->layout = ['col-sm-4'];
        
         
        // create the form actions
        $btn = $this->form->addAction(_t('Save'), new TAction([$this, 'onSave']), 'fa:save');
        $btn->class = 'btn btn-sm btn-primary';
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', _CLASS_));
        $container->add($this->form);
        
        parent::add($container);
    }

    public function onSave( $param )
    {
        try
        {
            $this->form->validate(); 
            $data = $this->form->getData(); 

            
            TTransaction::open('sample'); 
            
            $id = 1;
            $object = new Sobre($id);  
            $object->text = $data->text; 
            $object->store(); 
            
            $this->form->setData($data); 
            TTransaction::close(); 
            
            TToast::show('success', 'Registro Salvo', 'top center', 'far:check-circle' );
        }
        catch (Exception $e) 
        {
            new TMessage('error', $e->getMessage()); 
            $this->form->setData( $this->form->getData() ); 
            TTransaction::rollback(); 
        }
    }

    public function onClear( $param )
    {
        $this->form->clear(TRUE);
    }
    
    public function onEdit( $param )
    {
        try
        {
            $id = 1; 
            TTransaction::open('sample'); 
            $object = new Sobre($id); 
            $this->form->setData($object); 
            TTransaction::close(); 
        }
        catch (Exception $e) 
        {
            new TMessage('error', $e->getMessage()); 
            TTransaction::rollback(); 
        }
    }


}