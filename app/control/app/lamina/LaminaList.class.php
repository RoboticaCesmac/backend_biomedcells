<?php
/**
 * TurnoList Listing
 * @author  <your name here>
 */
class LaminaList extends TStandardList
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    protected $formgrid;
    protected $deleteButton;
    
    /**
     * Page constructor
     */
    public function __construct($param = NULL)
    {
        parent::__construct();


        
        $this->setDatabase('sample');            // defines the database
        $this->setActiveRecord('Lamina');   // defines the active record
        $this->setDefaultOrder('id', 'asc');         // defines the default order
        $this->setLimit(5);
        

        $this->addFilterField('id', '=', 'id'); // filterField, operator, formField
        $this->addFilterField('nome', 'like', 'nome'); // filterField, operator, formField
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_Lamina');
        $this->form->setFormTitle('Lâmina');
        

        // create the form fields
        $id = new TEntry('id');
        $nome = new TEntry('nome');


        // add the fields
        $this->form->addFields( [ new TLabel('Id') ], [ $id ] );
        $this->form->addFields( [ new TLabel('Nome') ], [ $nome ] );


        // set sizes
        $id->setSize('20%');
        $nome->setSize('20%');

        
        // keep the form filled during navigation with session data
        $this->form->setData( TSession::getValue(__CLASS__.'_filter_data') );
        
        // add the search form actions
        $btn = $this->form->addAction(_t('Find'), new TAction(array($this, 'onSearch')), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';
        // $btn1 = $this->form->addActionLink(_t('Clear'), new TAction([$this, 'clear']), 'fa:eraser ' );
        // $btn1->class = 'btn btn-sm btn-primary';
        $btn2 = $this->form->addHeaderActionLink("Novo",  new TAction(array('LaminaForm', 'onEdit')), 'fa:plus ');
        $btn2->class = 'btn btn-sm btn-primary';
        $btn2->style = 'margin-right: 5px; border-radius: 4px;';


        
        // creates a Datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->datatable = 'true';
        // $this->datagrid->enablePopover('Popover', 'Hi <b> {name} </b>');
        

        // creates the datagrid columns
        $col_id       = new TDataGridColumn('id', 'Id', 'center');
        $col_nome     = new TDataGridColumn('nome', 'Nome', 'center');
        // $col_laudo_id = new TDataGridColumn('laudo_id', 'Id do laudo', 'center'); 

        //ORDENAÇÃO DAS COLUNAS

        $col_id      ->setAction( new TAction([$this, 'onReload']), ['order' => 'id'] + $param);
        $col_nome    ->setAction( new TAction([$this, 'onReload']), ['order' => 'nome'] + $param);
        // $col_laudo_id->setAction( new TAction([$this, 'onReload']), ['order' => 'laudo_id'] + $param);
        

        //formata os dados 

        // add the columns to the DataGrid
        $this->datagrid->addColumn($col_id);
        $this->datagrid->addColumn($col_nome);
        // $this->datagrid->addColumn($col_laudo_id);


        // create DELETE action
        $action_edit = new TDataGridAction(array('LaminaForm', 'onEdit'));
        $action_edit->setButtonClass('btn btn-default');
        $action_edit->setLabel("Editar");
        $action_edit->setImage('far:edit');
        $action_edit->setField('id');
        $this->datagrid->addAction($action_edit);

        // create DELETE action
        $action_del = new TDataGridAction(array($this, 'onDelete'));
        $action_del->setButtonClass('btn btn-default');
        $action_del->setLabel("Deletar");
        $action_del->setImage('far:trash-alt red');
        $action_del->setField('id');
        $this->datagrid->addAction($action_del);

        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction([$this, 'onReload']));
        
        $panel = new TPanelGroup('', 'white');
        $panel->add($this->datagrid);
        $panel->addFooter($this->pageNavigation);
        
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add($panel);
        
        parent::add($container);
    }

    public function onReload($param = NULL)
    {
        try
        {   
            TTransaction::open('sample');
            $repository = new TRepository('Lamina');
            $limit = 10;

            if(empty($param['order']))
            {
                $param['order']     = 'id';
                $param['direction'] = 'asc';
            }

            $criteria = new TCriteria;
            $criteria->setProperty('limit', $limit);
            $criteria->setProperties($param);

            
            $grupos = TSession::getValue('usergroupids');
        

            // if(!in_array('1',$grupos))
            // {
            //     $criteria->add(new TFilter('system_user_id', '=', TSession::getValue('userid')));
            // }
            
            if($filters = TSession::getValue(__CLASS__.'_filters'))
            {
                foreach($filters as $filter)
                {
                    $criteria->add($filter);
                }
            }

            $objects = $repository->load($criteria, FALSE);


            if(is_callable($this->transformCallback))
            {
                call_user_func($this->transformCallback, $objects, $param);   //oq poha isso faz
            }

            $this->datagrid->clear(); // clear DataGrid

            //ADICIONA OS ITENS NA DATAGRID
            if($objects)
            {
                foreach($objects as $object)
                {
                    $this->datagrid->addItem($object);
                }
            }
            
            $criteria->resetProperties(); // remove algumas props para que possamos usar o count
            $count = $repository->count($criteria); // total de registros
            $this->pageNavigation->enableCounters();
            $this->pageNavigation->setCount($count); // quantos registros
            $this->pageNavigation->setProperties($param); // colocar os paramentros que estao no URL
            $this->pageNavigation->setLimit($limit); // colocar os paramentros que estao no UR

            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }


    public function onSearch($param = null)
    {
        // get the search form data
        $data = $this->form->getData();
        // clear session filters
        $filters = [];
        TSession::setValue(__CLASS__.'_filters',   NULL);

        if (isset($data->id) AND ($data->id)) {
            $filters[] = new TFilter('id', '=', $data->id); // create the filter
        }
        if (isset($data->nome) AND ($data->nome)) {
            $filters[] = new TFilter('nome', 'like', $data->nome); // create the filter
        }

        // fill the form with data again
        $this->form->setData($data);

        if(count($filters)>0)
        {

            TSession::setValue(__CLASS__.'_filters', $filters);
            TSession::setValue(__CLASS__ . '_filter_data', $data);

        }
        $param = array();
        $param['offset']    =0;
        $param['first_page']=1;
        $this->onReload($param);
    }

  

}
