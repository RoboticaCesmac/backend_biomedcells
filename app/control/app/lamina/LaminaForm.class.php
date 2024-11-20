<?php

class LaminaForm extends TPage
{
    protected $form; 
    const FORM_NAME = 'form_Lamina';
    
    public function __construct( $param )
    {
        parent::__construct();

        TPage::register_css('estilo_page',"
        
            label {
                font-size: 15px !important;
            }
        
        ");
  
        // creates the form
        $this->form = new BootstrapFormBuilder(self::FORM_NAME);
        $this->form->setFormTitle('<i class="fas fa-biohazard fa-fw"></i> Lâmina ');
        $this->form->setFieldSizes('100%');

        // create the form fields
        $id                   = new TEntry('id');
        $nome                 = new TEntry('nome');
        $neutrofilo_relativo  = new TEntry('neutrofilo_relativo');
        $monocito_relativo    = new TEntry('monocito_relativo');
        $eosilofilo_relativo  = new TEntry('eosilofilo_relativo');
        $basofilo_relativo    = new TEntry('basofilo_relativo');
        $linfocito_t_relativo = new TEntry('linfocito_t_relativo');
        $linfocito_a_relativo = new TEntry('linfocito_a_relativo');
        $blastos_relativo     = new TEntry('blastos_relativo');

        $neutrofilo_absoluto  = new TEntry('neutrofilo_absoluto');
        $monocito_absoluto    = new TEntry('monocito_absoluto');
        $eosilofilo_absoluto  = new TEntry('eosilofilo_absoluto');
        $basofilo_absoluto    = new TEntry('basofilo_absoluto');
        $linfocito_t_absoluto = new TEntry('linfocito_t_absoluto');
        $linfocito_a_absoluto = new TEntry('linfocito_a_absoluto');
        $blastos_absoluto     = new TEntry('blastos_absoluto');


        $hemacias = new TEntry('hemacias');
        $hemoglobina = new TEntry('hemoglobina');
        $hematocrito = new TEntry('hematocrito');
        $vcm = new TEntry('volume_corp_medio');
        $hcm = new TEntry('hemoglobina_corp_medio');
        $ch_hm = new TEntry('concentracao_hemoglobina');
        $rdw = new TEntry('rdw');
        $plaquetas = new TEntry('plaquetas');

        $observacao = new TText('observacao');

        
        // $foto = new TImageCapture('foto');
        // $foto->setButtonLabel('Salvar');
        
        $imagecropper = new TImageCropper('imagem');
        $imagecropper->setSize(250, 200);
        $imagecropper->setCropSize(300, 250);
        $imagecropper->setAllowedExtensions( ['png', 'jpg', 'jpeg'] );


        $observacao->setSize(350, 200);

        // add the fields

        
        // $this->form->addFields( [ (new TLabel('Valores Relativos')) ], [ new TLabel('Valores Absolutos') ] )->layout = ['col-sm-10', 'col-sm-2'];

        $this->form->appendPage('Dados');

        $this->form->addFields( [ new TLabel('Id') , $id ] )->layout = ['col-sm-2'];
        $this->form->addFields( [ new TLabel('Nome') , $nome ] )->layout = ['col-sm-2'];

        $this->form->addFields( [ new TLabel('Imagem'), $imagecropper ], [ new TLabel('Observações'), $observacao] )->layout = ['col-sm-3', 'col-sm-4'];

        
        // $label = new TLabel('Contagem', '#7D78B6', 16, 'bi');
        // $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        // $this->form->addContent( [$label] )->style = 'margin-top: 20px; margin-bottom: 15px;';


        $this->form->appendPage('Leucograma');

        $row = $this->form->addFields( [ new TLabel('Neutrofilos') ,$neutrofilo_relativo ] , [ new TLabel('') ,$neutrofilo_absoluto], [], 
        [ new TLabel('Monocitos') ,$monocito_relativo ] , [ new TLabel('') ,$monocito_absoluto]);
        $row->layout = ['col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1'];
        $row->style = 'margin-top: 15px;';

    
        $row = $this->form->addFields( [ new TLabel('Eosilofilos') ,$eosilofilo_relativo ] , [ new TLabel('') ,$eosilofilo_absoluto], [], 
        [ new TLabel('Basofilos') ,$basofilo_relativo ] , [ new TLabel('') ,$basofilo_absoluto]);
        $row->layout = ['col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1'];
        $row->style = 'margin-top: 15px;';

        

        $row = $this->form->addFields( [ new TLabel('Linfocitos T') ,$linfocito_t_relativo ] , [ new TLabel('') ,$linfocito_t_absoluto],  [], 
        [ new TLabel('Linfocitos A') ,$linfocito_a_relativo ] , [ new TLabel('') ,$linfocito_a_absoluto]);

        $row->layout = ['col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1'];
        $row->style = 'margin-top: 15px;';
        
       

        $row = $this->form->addFields( [ new TLabel('Blastos') ,$blastos_relativo ] , [ new TLabel('') ,$blastos_absoluto]);
        $row->layout = ['col-sm-1', 'col-sm-1'];
        $row->style = 'margin-top: 15px;';


       
        // $label = new TLabel('Láudo', '#7D78B6', 16, 'bi');
        // $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        // $this->form->addContent( [$label] );
        
        $this->form->appendPage('Eritograma');

        $row = $this->form->addFields( [ new TLabel('Hemácias'), $hemacias], [ new TLabel('Hemoglobina'), $hemoglobina]);
        $row->layout = ['col-sm-1', 'col-sm-1'];

        $row = $this->form->addFields( [ new TLabel('Hematocrito'), $hematocrito], [ new TLabel('plaquetas')  , $plaquetas]);
        $row->layout = ['col-sm-1', 'col-sm-1'];
        
        $row = $this->form->addFields( [ new TLabel('V.C.M.'), $vcm], [ new TLabel('H.C.M.'), $hcm]);
        $row->layout = ['col-sm-1', 'col-sm-1'];

        $row = $this->form->addFields( [ new TLabel('C.H.C.M.'), $ch_hm], [ new TLabel('R.D.W.') , $rdw]);
        $row->layout = ['col-sm-1', 'col-sm-1'];
      
 


        $neutrofilo_relativo->placeholder= 'Relativo';
        $monocito_relativo->placeholder= 'Relativo';
        $eosilofilo_relativo->placeholder= 'Relativo';
        $basofilo_relativo->placeholder= 'Relativo';
        $linfocito_t_relativo->placeholder= 'Relativo';
        $linfocito_a_relativo->placeholder= 'Relativo';
        $blastos_relativo->placeholder = 'Relativo';


        $neutrofilo_absoluto->placeholder= 'absoluto';
        $neutrofilo_absoluto->placeholder= 'absoluto';
        $monocito_absoluto->placeholder= 'absoluto';
        $eosilofilo_absoluto->placeholder= 'absoluto';
        $basofilo_absoluto->placeholder= 'absoluto';
        $linfocito_t_absoluto->placeholder= 'absoluto';
        $linfocito_a_absoluto->placeholder= 'absoluto';
        $blastos_absoluto->placeholder = 'absoluto';



        $neutrofilo_relativo->setMask('999');  
        $monocito_relativo->setMask('999');    
        $eosilofilo_relativo->setMask('999');  
        $basofilo_relativo->setMask('999');    
        $linfocito_t_relativo->setMask('999'); 
        $linfocito_a_relativo->setMask('999'); 
        $blastos_relativo->setMask('999'); 


        $neutrofilo_absoluto->setMask('99.999');  
        $monocito_absoluto->setMask('99.999');    
        $eosilofilo_absoluto->setMask('99.999');  
        $basofilo_absoluto->setMask('99.999');    
        $linfocito_t_absoluto->setMask('99.999'); 
        $linfocito_a_absoluto->setMask('99.999'); 
        $blastos_absoluto->setMask('99.999'); 


        $hemacias->setMask('99,9');
        $hemoglobina->setMask('99,9');
        $hematocrito->setMask('99,9');
        $vcm->setMask('99,9');
        $hcm->setMask('99,9');
        $ch_hm->setMask('99,9');
        $rdw->setMask('99,9');
        $plaquetas->setMask('999,9');

        if (!empty($id))
        {
            $id->setEditable(FALSE);
        }
        
         
        // create the form actions
        $btn = $this->form->addAction(_t('Save'), new TAction([$this, 'onSave']), 'fa:save');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addActionLink(_t('New'),  new TAction([$this, 'onEdit']), 'fa:eraser ');
        $this->form->addActionLink( _t('Back'), new TAction(['LaminaList','onReload']), 'far:arrow-alt-circle-left ');
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', _CLASS_));
        $container->add($this->form);
        
        parent::add($container);
    }

    public function onSave( $param )
    {
        $this->form->validate(); 
        $data = $this->form->getData(); 


        foreach($data as $key => $value)
        {
            if($key != 'id')
            {
                if((is_null($value) OR ($value == '')))
                {
                    $this->form->setData($data);
                    return TToast::show('warning', 'Todos os campos são obrigatórios !', 'top center', 'fas:exclamation-triangle' );
                }
            }
            
        }


        try
        {
             


            TTransaction::open('sample'); // open a transaction
            
            


            $object = new Lamina;  
            $object->fromArray( (array) $data); 

            

            if(!empty($data->imagem))
            {

                $path_info = pathinfo($data->imagem);

                $arquivo = '';

                if(strpos($data->imagem, 'tmp/') !== FALSE)
                {
                    $arquivo = str_replace('tmp/', '', $data->imagem);
                }
                else
                {
                    $arquivo = $data->imagem;
                }
                
                $stringSemEspacos = str_replace(' ', '', strtolower($data->nome));

                $source_file   = 'tmp/' . $arquivo;
                $target_path   = 'files/images/' . $stringSemEspacos;
                $target_file   =  $target_path . '/'  . $stringSemEspacos . '.' . $path_info['extension'];
                
                
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
                    $object->imagem = $target_file;
                    $data->imagem = $target_file;
                }
            }


            $object->store(); // save the object
            
            // get the generated id
            $data->id = $object->id;
            
            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction
            
            TToast::show('success', 'Registro Salvo', 'top center', 'far:check-circle' );
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
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
                $id = $param['id'];  // get the parameter $key
                TTransaction::open('sample'); // open a transaction
                $object = new Lamina($id); // instantiates the Active Record
                $this->form->setData($object); // fill the form
                TTransaction::close(); // close the transaction
            }
            else
            {
                $this->form->clear();
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

    public static function setUploadPhoto($param)
    {
        $path = 'tmp/' . $param['foto_up'];
        
        $obj = new stdClass;
        $obj->foto = $path;
        
        TForm::sendData(self::FORM_NAME, $obj);
        
        
        TScript::create("
            document.getElementById('timagecropper_foto').setAttribute('src', '{$path}');
            document.querySelector('.timagecropper_actions').style.display = 'block';
            document.querySelector('.fa-camera').style.display = 'none';
            document.getElementById('timagecropper_foto').style.display = 'block';

            $('[action=remove]').on('click', () => {
                $('.fa-check-circle').remove();
                $('[inputFile=\"upload\"]').css('padding', '0');
                tfile_clear_field('form_Lamina', 'foto_up');
            });
        ");
    }

}