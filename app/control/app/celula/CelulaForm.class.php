<?php

class CelulaForm extends TPage
{
    protected $form; 
    const FORM_NAME = 'form_Celula';
    

    public function __construct( $param )
    {
        parent::__construct();
  
        // creates the form
        $this->form = new BootstrapFormBuilder(self::FORM_NAME);
        $this->form->setFormTitle('<i class="fas fa-book-medical fa-fw"></i> Célula ');
        $this->form->setFieldSizes('100%');

        // create the form fields
        $id              = new TEntry('id');
        $nome            = new TEntry('nome');
        $descricao       = new TText('descricao');

        $imagecropper1 = new TImageCropper('imagem_1');
        $imagecropper1->setSize(250, 200);
        $imagecropper1->setCropSize(300, 300);
        $imagecropper1->setAllowedExtensions( ['png', 'jpg', 'jpeg'] );

        $imagecropper2 = new TImageCropper('imagem_2');
        $imagecropper2->setSize(250, 200);
        $imagecropper2->setCropSize(300, 300);
        $imagecropper2->setAllowedExtensions( ['png', 'jpg', 'jpeg'] );

        $imagecropper3 = new TImageCropper('imagem_3');
        $imagecropper3->setSize(250, 200);
        $imagecropper3->setCropSize(300, 300);
        $imagecropper3->setAllowedExtensions( ['png', 'jpg', 'jpeg'] );

        // add the fields
        $this->form->addFields( [ new TLabel('Id') ,$id ] )->layout = ['col-sm-1'];
        $this->form->addFields( [ new TLabel('Nome') , $nome ] )->layout = ['col-sm-2'];
        $this->form->addFields( [ new TLabel('Descricao') , $descricao ] )->layout = ['col-sm-4'];
        $this->form->addFields( [ new TLabel('Imagem 01') , $imagecropper1])->layout = ['col-sm-4'];
        $this->form->addFields( [ new TLabel('Imagem 02') , $imagecropper2])->layout = ['col-sm-4'];
        $this->form->addFields( [ new TLabel('Imagem 03') , $imagecropper3])->layout = ['col-sm-4'];


        // if (!empty($id))
        // {
        //     $id->setEditable(FALSE);
        // }
        
        $id->setEditable(FALSE);
        $nome->setEditable(FALSE);

         
        // create the form actions
        $btn = $this->form->addAction(_t('Save'), new TAction([$this, 'onSave']), 'fa:save');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addActionLink(_t('New'),  new TAction([$this, 'onEdit']), 'fa:eraser');
        $this->form->addActionLink( _t('Back'), new TAction(['CelulaList','onReload']), 'far:arrow-alt-circle-left');
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
            TTransaction::open('sample'); 
            
            $this->form->validate(); 
            $data = $this->form->getData(); 
            
            $object = new Celula;  
            $object->fromArray( (array) $data); 
           

            if(!empty($data->imagem_1))
            {

                
                
                $path = $this->saveImages($data->imagem_1, $data->nome . '1');
                $data->imagem_1 = $path;
                $object->imagem_1 = $path;
                
            }

            if(!empty($data->imagem_2))
            {

                $path = $this->saveImages($data->imagem_2, $data->nome . '2');
                $data->imagem_2 = $path;
                $object->imagem_2 = $path;
                
            }

            if(!empty($data->imagem_3))
            {

                $path = $this->saveImages($data->imagem_3, $data->nome . '3');
                $data->imagem_3 = $path;
                $object->imagem_3 = $path;
                
            }


            $object->store(); 
            
            
            $data->id = $object->id;
            
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
            if (isset($param['id']))
            {
                $id = $param['id'];  
                TTransaction::open('sample'); 
                $object = new Celula($id); 
                $this->form->setData($object); 
                TTransaction::close(); 
            }
            else
            {
                $this->form->clear();
            }
        }
        catch (Exception $e) 
        {
            new TMessage('error', $e->getMessage()); 
            TTransaction::rollback(); 
        }
    }

    public function saveImages($img_path, $nome)
    {
        $path_info = pathinfo($img_path);

        $arquivo = '';

        $uniq = uniqid();

        if(strpos($img_path, 'tmp/') !== FALSE)
        {
            $arquivo = str_replace('tmp/', '', $img_path);
        }
        else
        {
            $arquivo = $img_path;
        }
        
        $stringSemEspacos = str_replace(' ', '', strtolower($nome));

        $source_file   = 'tmp/' . $arquivo;
        $target_path   = 'files/images/celulas';
        $target_file   =  $target_path . '/'  . $stringSemEspacos . '_' . $uniq . '.' . $path_info['extension'];
        
        
        if (file_exists($source_file))
        { 
            if (!file_exists($target_path))
            {
                if (!@mkdir($target_path, 0777, true))
                {
                    throw new Exception(_t('Permission denied'). ': '. $target_path);
                }
            }

            rename($source_file, $target_file);
            return $target_file;
            
        }
        else
        {
            return $img_path;
        }

    }

}