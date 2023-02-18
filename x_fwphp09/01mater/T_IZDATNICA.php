<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

    include_once dirname(__FILE__) . '/components/startup.php';
    include_once dirname(__FILE__) . '/components/application.php';
    include_once dirname(__FILE__) . '/' . 'authorization.php';


    include_once dirname(__FILE__) . '/' . 'database_engine/oracle_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page/page_includes.php';

    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'AL32UTF8';
        GetApplication()->GetUserAuthentication()->applyIdentityToConnectionOptions($result);
        return $result;
    }

    
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFEPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('T STAVKA IFE');
            $this->SetMenuLabel('T STAVKA IFE');
    
            $this->dataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_STAVKA_IFE"');
            $this->dataset->addFields(
                array(
                    new IntegerField('SIFRA_STAVKE_I', true, true),
                    new StringField('T_ARTIKL_VRSTA_ARTIKLA', true),
                    new StringField('T_ARTIKL_SIFRA_ARTIKLA', true),
                    new IntegerField('KOLICINA', true),
                    new IntegerField('CIJENA', true),
                    new IntegerField('T_IFA_SIFRA_IFA'),
                    new IntegerField('RABAT'),
                    new IntegerField('POREZ_PP'),
                    new IntegerField('POREZ_PU'),
                    new IntegerField('POREZ_PDV'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new IntegerField('SIFRA_STAVUG'),
                    new IntegerField('SIFRA_IZDATNICE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('RED_BROJ_U_IFI')
                )
            );
            $this->dataset->AddLookupField('T_IFA_SIFRA_IFA', 'MERCEDES.T_IFA', new IntegerField('SIFRA_IFA'), new StringField('BROJ_IFA', false, false, false, false, 'LA1', 'LT1'), 'LT1');
            $this->dataset->AddLookupField('SIFRA_IZDATNICE', 'MERCEDES.T_IZDATNICA', new IntegerField('SIFRA_IZDATNICE'), new StringField('BROJ_IZDATNICE', false, false, false, false, 'LA2', 'LT2'), 'LT2');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I'),
                new FilterColumn($this->dataset, 'T_ARTIKL_VRSTA_ARTIKLA', 'T_ARTIKL_VRSTA_ARTIKLA', 'T ARTIKL VRSTA ARTIKLA'),
                new FilterColumn($this->dataset, 'T_ARTIKL_SIFRA_ARTIKLA', 'T_ARTIKL_SIFRA_ARTIKLA', 'T ARTIKL SIFRA ARTIKLA'),
                new FilterColumn($this->dataset, 'KOLICINA', 'KOLICINA', 'KOLICINA'),
                new FilterColumn($this->dataset, 'CIJENA', 'CIJENA', 'CIJENA'),
                new FilterColumn($this->dataset, 'T_IFA_SIFRA_IFA', 'LA1', 'T IFA SIFRA IFA'),
                new FilterColumn($this->dataset, 'RABAT', 'RABAT', 'RABAT'),
                new FilterColumn($this->dataset, 'POREZ_PP', 'POREZ_PP', 'POREZ PP'),
                new FilterColumn($this->dataset, 'POREZ_PU', 'POREZ_PU', 'POREZ PU'),
                new FilterColumn($this->dataset, 'POREZ_PDV', 'POREZ_PDV', 'POREZ PDV'),
                new FilterColumn($this->dataset, 'SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE'),
                new FilterColumn($this->dataset, 'SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG'),
                new FilterColumn($this->dataset, 'SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE'),
                new FilterColumn($this->dataset, 'NAPOMENA', 'NAPOMENA', 'NAPOMENA'),
                new FilterColumn($this->dataset, 'RED_BROJ_U_IFI', 'RED_BROJ_U_IFI', 'RED BROJ U IFI')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['SIFRA_STAVKE_I'])
                ->addColumn($columns['T_ARTIKL_VRSTA_ARTIKLA'])
                ->addColumn($columns['T_ARTIKL_SIFRA_ARTIKLA'])
                ->addColumn($columns['KOLICINA'])
                ->addColumn($columns['CIJENA'])
                ->addColumn($columns['T_IFA_SIFRA_IFA'])
                ->addColumn($columns['RABAT'])
                ->addColumn($columns['POREZ_PP'])
                ->addColumn($columns['POREZ_PU'])
                ->addColumn($columns['POREZ_PDV'])
                ->addColumn($columns['SIFRA_PRIMKE'])
                ->addColumn($columns['SIFRA_STAVUG'])
                ->addColumn($columns['SIFRA_IZDATNICE'])
                ->addColumn($columns['NAPOMENA'])
                ->addColumn($columns['RED_BROJ_U_IFI']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('T_IFA_SIFRA_IFA')
                ->setOptionsFor('SIFRA_IZDATNICE');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('sifra_stavke_i_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_STAVKE_I'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('t_artikl_vrsta_artikla_edit');
            $main_editor->SetMaxLength(1);
            
            $filterBuilder->addColumn(
                $columns['T_ARTIKL_VRSTA_ARTIKLA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('t_artikl_sifra_artikla_edit');
            $main_editor->SetMaxLength(20);
            
            $filterBuilder->addColumn(
                $columns['T_ARTIKL_SIFRA_ARTIKLA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('kolicina_edit');
            
            $filterBuilder->addColumn(
                $columns['KOLICINA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('cijena_edit');
            
            $filterBuilder->addColumn(
                $columns['CIJENA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('t_ifa_sifra_ifa_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_T_IFA_SIFRA_IFA_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('T_IFA_SIFRA_IFA', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_T_IFA_SIFRA_IFA_search');
            
            $text_editor = new TextEdit('T_IFA_SIFRA_IFA');
            
            $filterBuilder->addColumn(
                $columns['T_IFA_SIFRA_IFA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('rabat_edit');
            
            $filterBuilder->addColumn(
                $columns['RABAT'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('porez_pp_edit');
            
            $filterBuilder->addColumn(
                $columns['POREZ_PP'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('porez_pu_edit');
            
            $filterBuilder->addColumn(
                $columns['POREZ_PU'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('porez_pdv_edit');
            
            $filterBuilder->addColumn(
                $columns['POREZ_PDV'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_primke_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_PRIMKE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_stavug_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_STAVUG'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_SIFRA_IZDATNICE_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_IZDATNICE', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_SIFRA_IZDATNICE_search');
            
            $text_editor = new TextEdit('SIFRA_IZDATNICE');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_IZDATNICE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('napomena_edit');
            $main_editor->SetMaxLength(64);
            
            $filterBuilder->addColumn(
                $columns['NAPOMENA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('red_broj_u_ifi_edit');
            
            $filterBuilder->addColumn(
                $columns['RED_BROJ_U_IFI'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->deleteOperationIsAllowed()) {
                $operation = new AjaxOperation(OPERATION_DELETE,
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'),
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'), $this->dataset,
                    $this->GetModalGridDeleteHandler(), $grid
                );
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
            }
            
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for T_ARTIKL_VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('T_ARTIKL_VRSTA_ARTIKLA', 'T_ARTIKL_VRSTA_ARTIKLA', 'T ARTIKL VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for T_ARTIKL_SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('T_ARTIKL_SIFRA_ARTIKLA', 'T_ARTIKL_SIFRA_ARTIKLA', 'T ARTIKL SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for KOLICINA field
            //
            $column = new NumberViewColumn('KOLICINA', 'KOLICINA', 'KOLICINA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for CIJENA field
            //
            $column = new NumberViewColumn('CIJENA', 'CIJENA', 'CIJENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for BROJ_IFA field
            //
            $column = new TextViewColumn('T_IFA_SIFRA_IFA', 'LA1', 'T IFA SIFRA IFA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for RABAT field
            //
            $column = new NumberViewColumn('RABAT', 'RABAT', 'RABAT', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for POREZ_PP field
            //
            $column = new NumberViewColumn('POREZ_PP', 'POREZ_PP', 'POREZ PP', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for POREZ_PU field
            //
            $column = new NumberViewColumn('POREZ_PU', 'POREZ_PU', 'POREZ PU', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for POREZ_PDV field
            //
            $column = new NumberViewColumn('POREZ_PDV', 'POREZ_PDV', 'POREZ PDV', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_STAVUG field
            //
            $column = new NumberViewColumn('SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for RED_BROJ_U_IFI field
            //
            $column = new NumberViewColumn('RED_BROJ_U_IFI', 'RED_BROJ_U_IFI', 'RED BROJ U IFI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for T_ARTIKL_VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('T_ARTIKL_VRSTA_ARTIKLA', 'T_ARTIKL_VRSTA_ARTIKLA', 'T ARTIKL VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for T_ARTIKL_SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('T_ARTIKL_SIFRA_ARTIKLA', 'T_ARTIKL_SIFRA_ARTIKLA', 'T ARTIKL SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for KOLICINA field
            //
            $column = new NumberViewColumn('KOLICINA', 'KOLICINA', 'KOLICINA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CIJENA field
            //
            $column = new NumberViewColumn('CIJENA', 'CIJENA', 'CIJENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for BROJ_IFA field
            //
            $column = new TextViewColumn('T_IFA_SIFRA_IFA', 'LA1', 'T IFA SIFRA IFA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for RABAT field
            //
            $column = new NumberViewColumn('RABAT', 'RABAT', 'RABAT', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for POREZ_PP field
            //
            $column = new NumberViewColumn('POREZ_PP', 'POREZ_PP', 'POREZ PP', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for POREZ_PU field
            //
            $column = new NumberViewColumn('POREZ_PU', 'POREZ_PU', 'POREZ PU', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for POREZ_PDV field
            //
            $column = new NumberViewColumn('POREZ_PDV', 'POREZ_PDV', 'POREZ PDV', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_STAVUG field
            //
            $column = new NumberViewColumn('SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for RED_BROJ_U_IFI field
            //
            $column = new NumberViewColumn('RED_BROJ_U_IFI', 'RED_BROJ_U_IFI', 'RED BROJ U IFI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_STAVKE_I field
            //
            $editor = new TextEdit('sifra_stavke_i_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVKE I', 'SIFRA_STAVKE_I', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for T_ARTIKL_VRSTA_ARTIKLA field
            //
            $editor = new TextEdit('t_artikl_vrsta_artikla_edit');
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('T ARTIKL VRSTA ARTIKLA', 'T_ARTIKL_VRSTA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for T_ARTIKL_SIFRA_ARTIKLA field
            //
            $editor = new TextEdit('t_artikl_sifra_artikla_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('T ARTIKL SIFRA ARTIKLA', 'T_ARTIKL_SIFRA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for KOLICINA field
            //
            $editor = new TextEdit('kolicina_edit');
            $editColumn = new CustomEditColumn('KOLICINA', 'KOLICINA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CIJENA field
            //
            $editor = new TextEdit('cijena_edit');
            $editColumn = new CustomEditColumn('CIJENA', 'CIJENA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for T_IFA_SIFRA_IFA field
            //
            $editor = new DynamicCombobox('t_ifa_sifra_ifa_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IFA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IFA', true, true),
                    new StringField('BROJ_IFA', true),
                    new DateTimeField('DATUM_IFA', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('NAPOMENA'),
                    new StringField('SIFRA_TIP_RN'),
                    new StringField('STORNO'),
                    new IntegerField('OBU_SIFRA_OBRUGOV'),
                    new StringField('PRIJENOS_POR_OBVEZE'),
                    new StringField('VRSTA_POSL_PROC')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IFA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('T IFA SIFRA IFA', 'T_IFA_SIFRA_IFA', 'LA1', 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_T_IFA_SIFRA_IFA_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IFA', 'BROJ_IFA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for RABAT field
            //
            $editor = new TextEdit('rabat_edit');
            $editColumn = new CustomEditColumn('RABAT', 'RABAT', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PP field
            //
            $editor = new TextEdit('porez_pp_edit');
            $editColumn = new CustomEditColumn('POREZ PP', 'POREZ_PP', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PU field
            //
            $editor = new TextEdit('porez_pu_edit');
            $editColumn = new CustomEditColumn('POREZ PU', 'POREZ_PU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PDV field
            //
            $editor = new TextEdit('porez_pdv_edit');
            $editColumn = new CustomEditColumn('POREZ PDV', 'POREZ_PDV', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRIMKE field
            //
            $editor = new TextEdit('sifra_primke_edit');
            $editColumn = new CustomEditColumn('SIFRA PRIMKE', 'SIFRA_PRIMKE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_STAVUG field
            //
            $editor = new TextEdit('sifra_stavug_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVUG', 'SIFRA_STAVUG', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA2', 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextEdit('napomena_edit');
            $editor->SetMaxLength(64);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for RED_BROJ_U_IFI field
            //
            $editor = new TextEdit('red_broj_u_ifi_edit');
            $editColumn = new CustomEditColumn('RED BROJ U IFI', 'RED_BROJ_U_IFI', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for T_ARTIKL_VRSTA_ARTIKLA field
            //
            $editor = new TextEdit('t_artikl_vrsta_artikla_edit');
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('T ARTIKL VRSTA ARTIKLA', 'T_ARTIKL_VRSTA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for T_ARTIKL_SIFRA_ARTIKLA field
            //
            $editor = new TextEdit('t_artikl_sifra_artikla_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('T ARTIKL SIFRA ARTIKLA', 'T_ARTIKL_SIFRA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for KOLICINA field
            //
            $editor = new TextEdit('kolicina_edit');
            $editColumn = new CustomEditColumn('KOLICINA', 'KOLICINA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for CIJENA field
            //
            $editor = new TextEdit('cijena_edit');
            $editColumn = new CustomEditColumn('CIJENA', 'CIJENA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for T_IFA_SIFRA_IFA field
            //
            $editor = new DynamicCombobox('t_ifa_sifra_ifa_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IFA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IFA', true, true),
                    new StringField('BROJ_IFA', true),
                    new DateTimeField('DATUM_IFA', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('NAPOMENA'),
                    new StringField('SIFRA_TIP_RN'),
                    new StringField('STORNO'),
                    new IntegerField('OBU_SIFRA_OBRUGOV'),
                    new StringField('PRIJENOS_POR_OBVEZE'),
                    new StringField('VRSTA_POSL_PROC')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IFA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('T IFA SIFRA IFA', 'T_IFA_SIFRA_IFA', 'LA1', 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_T_IFA_SIFRA_IFA_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IFA', 'BROJ_IFA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for RABAT field
            //
            $editor = new TextEdit('rabat_edit');
            $editColumn = new CustomEditColumn('RABAT', 'RABAT', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PP field
            //
            $editor = new TextEdit('porez_pp_edit');
            $editColumn = new CustomEditColumn('POREZ PP', 'POREZ_PP', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PU field
            //
            $editor = new TextEdit('porez_pu_edit');
            $editColumn = new CustomEditColumn('POREZ PU', 'POREZ_PU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PDV field
            //
            $editor = new TextEdit('porez_pdv_edit');
            $editColumn = new CustomEditColumn('POREZ PDV', 'POREZ_PDV', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRIMKE field
            //
            $editor = new TextEdit('sifra_primke_edit');
            $editColumn = new CustomEditColumn('SIFRA PRIMKE', 'SIFRA_PRIMKE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_STAVUG field
            //
            $editor = new TextEdit('sifra_stavug_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVUG', 'SIFRA_STAVUG', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA2', 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextEdit('napomena_edit');
            $editor->SetMaxLength(64);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for RED_BROJ_U_IFI field
            //
            $editor = new TextEdit('red_broj_u_ifi_edit');
            $editColumn = new CustomEditColumn('RED BROJ U IFI', 'RED_BROJ_U_IFI', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddToggleEditColumns(Grid $grid)
        {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_STAVKE_I field
            //
            $editor = new TextEdit('sifra_stavke_i_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVKE I', 'SIFRA_STAVKE_I', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for T_ARTIKL_VRSTA_ARTIKLA field
            //
            $editor = new TextEdit('t_artikl_vrsta_artikla_edit');
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('T ARTIKL VRSTA ARTIKLA', 'T_ARTIKL_VRSTA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for T_ARTIKL_SIFRA_ARTIKLA field
            //
            $editor = new TextEdit('t_artikl_sifra_artikla_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('T ARTIKL SIFRA ARTIKLA', 'T_ARTIKL_SIFRA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for KOLICINA field
            //
            $editor = new TextEdit('kolicina_edit');
            $editColumn = new CustomEditColumn('KOLICINA', 'KOLICINA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CIJENA field
            //
            $editor = new TextEdit('cijena_edit');
            $editColumn = new CustomEditColumn('CIJENA', 'CIJENA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for T_IFA_SIFRA_IFA field
            //
            $editor = new DynamicCombobox('t_ifa_sifra_ifa_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IFA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IFA', true, true),
                    new StringField('BROJ_IFA', true),
                    new DateTimeField('DATUM_IFA', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('NAPOMENA'),
                    new StringField('SIFRA_TIP_RN'),
                    new StringField('STORNO'),
                    new IntegerField('OBU_SIFRA_OBRUGOV'),
                    new StringField('PRIJENOS_POR_OBVEZE'),
                    new StringField('VRSTA_POSL_PROC')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IFA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('T IFA SIFRA IFA', 'T_IFA_SIFRA_IFA', 'LA1', 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_T_IFA_SIFRA_IFA_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IFA', 'BROJ_IFA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for RABAT field
            //
            $editor = new TextEdit('rabat_edit');
            $editColumn = new CustomEditColumn('RABAT', 'RABAT', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for POREZ_PP field
            //
            $editor = new TextEdit('porez_pp_edit');
            $editColumn = new CustomEditColumn('POREZ PP', 'POREZ_PP', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for POREZ_PU field
            //
            $editor = new TextEdit('porez_pu_edit');
            $editColumn = new CustomEditColumn('POREZ PU', 'POREZ_PU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for POREZ_PDV field
            //
            $editor = new TextEdit('porez_pdv_edit');
            $editColumn = new CustomEditColumn('POREZ PDV', 'POREZ_PDV', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRIMKE field
            //
            $editor = new TextEdit('sifra_primke_edit');
            $editColumn = new CustomEditColumn('SIFRA PRIMKE', 'SIFRA_PRIMKE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_STAVUG field
            //
            $editor = new TextEdit('sifra_stavug_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVUG', 'SIFRA_STAVUG', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA2', 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextEdit('napomena_edit');
            $editor->SetMaxLength(64);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for RED_BROJ_U_IFI field
            //
            $editor = new TextEdit('red_broj_u_ifi_edit');
            $editColumn = new CustomEditColumn('RED BROJ U IFI', 'RED_BROJ_U_IFI', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for T_ARTIKL_VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('T_ARTIKL_VRSTA_ARTIKLA', 'T_ARTIKL_VRSTA_ARTIKLA', 'T ARTIKL VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for T_ARTIKL_SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('T_ARTIKL_SIFRA_ARTIKLA', 'T_ARTIKL_SIFRA_ARTIKLA', 'T ARTIKL SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for KOLICINA field
            //
            $column = new NumberViewColumn('KOLICINA', 'KOLICINA', 'KOLICINA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for CIJENA field
            //
            $column = new NumberViewColumn('CIJENA', 'CIJENA', 'CIJENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for BROJ_IFA field
            //
            $column = new TextViewColumn('T_IFA_SIFRA_IFA', 'LA1', 'T IFA SIFRA IFA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for RABAT field
            //
            $column = new NumberViewColumn('RABAT', 'RABAT', 'RABAT', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for POREZ_PP field
            //
            $column = new NumberViewColumn('POREZ_PP', 'POREZ_PP', 'POREZ PP', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for POREZ_PU field
            //
            $column = new NumberViewColumn('POREZ_PU', 'POREZ_PU', 'POREZ PU', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for POREZ_PDV field
            //
            $column = new NumberViewColumn('POREZ_PDV', 'POREZ_PDV', 'POREZ PDV', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_STAVUG field
            //
            $column = new NumberViewColumn('SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for RED_BROJ_U_IFI field
            //
            $column = new NumberViewColumn('RED_BROJ_U_IFI', 'RED_BROJ_U_IFI', 'RED BROJ U IFI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for T_ARTIKL_VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('T_ARTIKL_VRSTA_ARTIKLA', 'T_ARTIKL_VRSTA_ARTIKLA', 'T ARTIKL VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for T_ARTIKL_SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('T_ARTIKL_SIFRA_ARTIKLA', 'T_ARTIKL_SIFRA_ARTIKLA', 'T ARTIKL SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for KOLICINA field
            //
            $column = new NumberViewColumn('KOLICINA', 'KOLICINA', 'KOLICINA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for CIJENA field
            //
            $column = new NumberViewColumn('CIJENA', 'CIJENA', 'CIJENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for BROJ_IFA field
            //
            $column = new TextViewColumn('T_IFA_SIFRA_IFA', 'LA1', 'T IFA SIFRA IFA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for RABAT field
            //
            $column = new NumberViewColumn('RABAT', 'RABAT', 'RABAT', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for POREZ_PP field
            //
            $column = new NumberViewColumn('POREZ_PP', 'POREZ_PP', 'POREZ PP', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for POREZ_PU field
            //
            $column = new NumberViewColumn('POREZ_PU', 'POREZ_PU', 'POREZ PU', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for POREZ_PDV field
            //
            $column = new NumberViewColumn('POREZ_PDV', 'POREZ_PDV', 'POREZ PDV', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_STAVUG field
            //
            $column = new NumberViewColumn('SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for RED_BROJ_U_IFI field
            //
            $column = new NumberViewColumn('RED_BROJ_U_IFI', 'RED_BROJ_U_IFI', 'RED BROJ U IFI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for T_ARTIKL_VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('T_ARTIKL_VRSTA_ARTIKLA', 'T_ARTIKL_VRSTA_ARTIKLA', 'T ARTIKL VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for T_ARTIKL_SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('T_ARTIKL_SIFRA_ARTIKLA', 'T_ARTIKL_SIFRA_ARTIKLA', 'T ARTIKL SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for KOLICINA field
            //
            $column = new NumberViewColumn('KOLICINA', 'KOLICINA', 'KOLICINA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for CIJENA field
            //
            $column = new NumberViewColumn('CIJENA', 'CIJENA', 'CIJENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for BROJ_IFA field
            //
            $column = new TextViewColumn('T_IFA_SIFRA_IFA', 'LA1', 'T IFA SIFRA IFA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for RABAT field
            //
            $column = new NumberViewColumn('RABAT', 'RABAT', 'RABAT', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for POREZ_PP field
            //
            $column = new NumberViewColumn('POREZ_PP', 'POREZ_PP', 'POREZ PP', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for POREZ_PU field
            //
            $column = new NumberViewColumn('POREZ_PU', 'POREZ_PU', 'POREZ PU', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for POREZ_PDV field
            //
            $column = new NumberViewColumn('POREZ_PDV', 'POREZ_PDV', 'POREZ PDV', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_STAVUG field
            //
            $column = new NumberViewColumn('SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for RED_BROJ_U_IFI field
            //
            $column = new NumberViewColumn('RED_BROJ_U_IFI', 'RED_BROJ_U_IFI', 'RED BROJ U IFI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddToggleEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setAllowedActions(array('view', 'insert', 'copy', 'edit', 'multi-edit', 'delete', 'multi-delete'));
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(true);
            $this->setExportListAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IFA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IFA', true, true),
                    new StringField('BROJ_IFA', true),
                    new DateTimeField('DATUM_IFA', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('NAPOMENA'),
                    new StringField('SIFRA_TIP_RN'),
                    new StringField('STORNO'),
                    new IntegerField('OBU_SIFRA_OBRUGOV'),
                    new StringField('PRIJENOS_POR_OBVEZE'),
                    new StringField('VRSTA_POSL_PROC')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IFA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_T_IFA_SIFRA_IFA_search', 'SIFRA_IFA', 'BROJ_IFA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IFA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IFA', true, true),
                    new StringField('BROJ_IFA', true),
                    new DateTimeField('DATUM_IFA', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('NAPOMENA'),
                    new StringField('SIFRA_TIP_RN'),
                    new StringField('STORNO'),
                    new IntegerField('OBU_SIFRA_OBRUGOV'),
                    new StringField('PRIJENOS_POR_OBVEZE'),
                    new StringField('VRSTA_POSL_PROC')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IFA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_T_IFA_SIFRA_IFA_search', 'SIFRA_IFA', 'BROJ_IFA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IFA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IFA', true, true),
                    new StringField('BROJ_IFA', true),
                    new DateTimeField('DATUM_IFA', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('NAPOMENA'),
                    new StringField('SIFRA_TIP_RN'),
                    new StringField('STORNO'),
                    new IntegerField('OBU_SIFRA_OBRUGOV'),
                    new StringField('PRIJENOS_POR_OBVEZE'),
                    new StringField('VRSTA_POSL_PROC')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IFA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_T_IFA_SIFRA_IFA_search', 'SIFRA_IFA', 'BROJ_IFA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IFA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IFA', true, true),
                    new StringField('BROJ_IFA', true),
                    new DateTimeField('DATUM_IFA', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('NAPOMENA'),
                    new StringField('SIFRA_TIP_RN'),
                    new StringField('STORNO'),
                    new IntegerField('OBU_SIFRA_OBRUGOV'),
                    new StringField('PRIJENOS_POR_OBVEZE'),
                    new StringField('VRSTA_POSL_PROC')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IFA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_T_IFA_SIFRA_IFA_search', 'SIFRA_IFA', 'BROJ_IFA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }
    
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICEPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('T STAVKA IZDATNICE');
            $this->SetMenuLabel('T STAVKA IZDATNICE');
    
            $this->dataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_STAVKA_IZDATNICE"');
            $this->dataset->addFields(
                array(
                    new IntegerField('SIFRA_STAVKE_I', true, true),
                    new IntegerField('SIFRA_IZDATNICE', true),
                    new StringField('VRSTA_ARTIKLA', true),
                    new StringField('SIFRA_ARTIKLA', true),
                    new IntegerField('KOLICINA', true),
                    new IntegerField('CIJENA'),
                    new IntegerField('RABAT'),
                    new IntegerField('POREZ_PP'),
                    new IntegerField('POREZ_PU'),
                    new IntegerField('POREZ_PDV'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new IntegerField('SIFRA_STAVUG')
                )
            );
            $this->dataset->AddLookupField('SIFRA_IZDATNICE', 'MERCEDES.T_IZDATNICA', new IntegerField('SIFRA_IZDATNICE'), new StringField('BROJ_IZDATNICE', false, false, false, false, 'LA1', 'LT1'), 'LT1');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I'),
                new FilterColumn($this->dataset, 'SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE'),
                new FilterColumn($this->dataset, 'VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA'),
                new FilterColumn($this->dataset, 'SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA'),
                new FilterColumn($this->dataset, 'KOLICINA', 'KOLICINA', 'KOLICINA'),
                new FilterColumn($this->dataset, 'CIJENA', 'CIJENA', 'CIJENA'),
                new FilterColumn($this->dataset, 'RABAT', 'RABAT', 'RABAT'),
                new FilterColumn($this->dataset, 'POREZ_PP', 'POREZ_PP', 'POREZ PP'),
                new FilterColumn($this->dataset, 'POREZ_PU', 'POREZ_PU', 'POREZ PU'),
                new FilterColumn($this->dataset, 'POREZ_PDV', 'POREZ_PDV', 'POREZ PDV'),
                new FilterColumn($this->dataset, 'SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE'),
                new FilterColumn($this->dataset, 'SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['SIFRA_STAVKE_I'])
                ->addColumn($columns['SIFRA_IZDATNICE'])
                ->addColumn($columns['VRSTA_ARTIKLA'])
                ->addColumn($columns['SIFRA_ARTIKLA'])
                ->addColumn($columns['KOLICINA'])
                ->addColumn($columns['CIJENA'])
                ->addColumn($columns['RABAT'])
                ->addColumn($columns['POREZ_PP'])
                ->addColumn($columns['POREZ_PU'])
                ->addColumn($columns['POREZ_PDV'])
                ->addColumn($columns['SIFRA_PRIMKE'])
                ->addColumn($columns['SIFRA_STAVUG']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('SIFRA_IZDATNICE');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('sifra_stavke_i_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_STAVKE_I'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_SIFRA_IZDATNICE_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_IZDATNICE', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_SIFRA_IZDATNICE_search');
            
            $text_editor = new TextEdit('SIFRA_IZDATNICE');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_IZDATNICE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('vrsta_artikla_edit');
            $main_editor->SetMaxLength(1);
            
            $filterBuilder->addColumn(
                $columns['VRSTA_ARTIKLA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_artikla_edit');
            $main_editor->SetMaxLength(20);
            
            $filterBuilder->addColumn(
                $columns['SIFRA_ARTIKLA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('kolicina_edit');
            
            $filterBuilder->addColumn(
                $columns['KOLICINA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('cijena_edit');
            
            $filterBuilder->addColumn(
                $columns['CIJENA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('rabat_edit');
            
            $filterBuilder->addColumn(
                $columns['RABAT'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('porez_pp_edit');
            
            $filterBuilder->addColumn(
                $columns['POREZ_PP'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('porez_pu_edit');
            
            $filterBuilder->addColumn(
                $columns['POREZ_PU'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('porez_pdv_edit');
            
            $filterBuilder->addColumn(
                $columns['POREZ_PDV'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_primke_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_PRIMKE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_stavug_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_STAVUG'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->deleteOperationIsAllowed()) {
                $operation = new AjaxOperation(OPERATION_DELETE,
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'),
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'), $this->dataset,
                    $this->GetModalGridDeleteHandler(), $grid
                );
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
            }
            
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for KOLICINA field
            //
            $column = new NumberViewColumn('KOLICINA', 'KOLICINA', 'KOLICINA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for CIJENA field
            //
            $column = new NumberViewColumn('CIJENA', 'CIJENA', 'CIJENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for RABAT field
            //
            $column = new NumberViewColumn('RABAT', 'RABAT', 'RABAT', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for POREZ_PP field
            //
            $column = new NumberViewColumn('POREZ_PP', 'POREZ_PP', 'POREZ PP', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for POREZ_PU field
            //
            $column = new NumberViewColumn('POREZ_PU', 'POREZ_PU', 'POREZ PU', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for POREZ_PDV field
            //
            $column = new NumberViewColumn('POREZ_PDV', 'POREZ_PDV', 'POREZ PDV', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_STAVUG field
            //
            $column = new NumberViewColumn('SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for KOLICINA field
            //
            $column = new NumberViewColumn('KOLICINA', 'KOLICINA', 'KOLICINA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CIJENA field
            //
            $column = new NumberViewColumn('CIJENA', 'CIJENA', 'CIJENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for RABAT field
            //
            $column = new NumberViewColumn('RABAT', 'RABAT', 'RABAT', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for POREZ_PP field
            //
            $column = new NumberViewColumn('POREZ_PP', 'POREZ_PP', 'POREZ PP', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for POREZ_PU field
            //
            $column = new NumberViewColumn('POREZ_PU', 'POREZ_PU', 'POREZ PU', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for POREZ_PDV field
            //
            $column = new NumberViewColumn('POREZ_PDV', 'POREZ_PDV', 'POREZ PDV', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_STAVUG field
            //
            $column = new NumberViewColumn('SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_STAVKE_I field
            //
            $editor = new TextEdit('sifra_stavke_i_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVKE I', 'SIFRA_STAVKE_I', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA1', 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for VRSTA_ARTIKLA field
            //
            $editor = new TextEdit('vrsta_artikla_edit');
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('VRSTA ARTIKLA', 'VRSTA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_ARTIKLA field
            //
            $editor = new TextEdit('sifra_artikla_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('SIFRA ARTIKLA', 'SIFRA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for KOLICINA field
            //
            $editor = new TextEdit('kolicina_edit');
            $editColumn = new CustomEditColumn('KOLICINA', 'KOLICINA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CIJENA field
            //
            $editor = new TextEdit('cijena_edit');
            $editColumn = new CustomEditColumn('CIJENA', 'CIJENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for RABAT field
            //
            $editor = new TextEdit('rabat_edit');
            $editColumn = new CustomEditColumn('RABAT', 'RABAT', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PP field
            //
            $editor = new TextEdit('porez_pp_edit');
            $editColumn = new CustomEditColumn('POREZ PP', 'POREZ_PP', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PU field
            //
            $editor = new TextEdit('porez_pu_edit');
            $editColumn = new CustomEditColumn('POREZ PU', 'POREZ_PU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PDV field
            //
            $editor = new TextEdit('porez_pdv_edit');
            $editColumn = new CustomEditColumn('POREZ PDV', 'POREZ_PDV', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRIMKE field
            //
            $editor = new TextEdit('sifra_primke_edit');
            $editColumn = new CustomEditColumn('SIFRA PRIMKE', 'SIFRA_PRIMKE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_STAVUG field
            //
            $editor = new TextEdit('sifra_stavug_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVUG', 'SIFRA_STAVUG', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA1', 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for VRSTA_ARTIKLA field
            //
            $editor = new TextEdit('vrsta_artikla_edit');
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('VRSTA ARTIKLA', 'VRSTA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_ARTIKLA field
            //
            $editor = new TextEdit('sifra_artikla_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('SIFRA ARTIKLA', 'SIFRA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for KOLICINA field
            //
            $editor = new TextEdit('kolicina_edit');
            $editColumn = new CustomEditColumn('KOLICINA', 'KOLICINA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for CIJENA field
            //
            $editor = new TextEdit('cijena_edit');
            $editColumn = new CustomEditColumn('CIJENA', 'CIJENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for RABAT field
            //
            $editor = new TextEdit('rabat_edit');
            $editColumn = new CustomEditColumn('RABAT', 'RABAT', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PP field
            //
            $editor = new TextEdit('porez_pp_edit');
            $editColumn = new CustomEditColumn('POREZ PP', 'POREZ_PP', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PU field
            //
            $editor = new TextEdit('porez_pu_edit');
            $editColumn = new CustomEditColumn('POREZ PU', 'POREZ_PU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for POREZ_PDV field
            //
            $editor = new TextEdit('porez_pdv_edit');
            $editColumn = new CustomEditColumn('POREZ PDV', 'POREZ_PDV', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRIMKE field
            //
            $editor = new TextEdit('sifra_primke_edit');
            $editColumn = new CustomEditColumn('SIFRA PRIMKE', 'SIFRA_PRIMKE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_STAVUG field
            //
            $editor = new TextEdit('sifra_stavug_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVUG', 'SIFRA_STAVUG', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddToggleEditColumns(Grid $grid)
        {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_STAVKE_I field
            //
            $editor = new TextEdit('sifra_stavke_i_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVKE I', 'SIFRA_STAVKE_I', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA1', 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for VRSTA_ARTIKLA field
            //
            $editor = new TextEdit('vrsta_artikla_edit');
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('VRSTA ARTIKLA', 'VRSTA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_ARTIKLA field
            //
            $editor = new TextEdit('sifra_artikla_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('SIFRA ARTIKLA', 'SIFRA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for KOLICINA field
            //
            $editor = new TextEdit('kolicina_edit');
            $editColumn = new CustomEditColumn('KOLICINA', 'KOLICINA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CIJENA field
            //
            $editor = new TextEdit('cijena_edit');
            $editColumn = new CustomEditColumn('CIJENA', 'CIJENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for RABAT field
            //
            $editor = new TextEdit('rabat_edit');
            $editColumn = new CustomEditColumn('RABAT', 'RABAT', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for POREZ_PP field
            //
            $editor = new TextEdit('porez_pp_edit');
            $editColumn = new CustomEditColumn('POREZ PP', 'POREZ_PP', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for POREZ_PU field
            //
            $editor = new TextEdit('porez_pu_edit');
            $editColumn = new CustomEditColumn('POREZ PU', 'POREZ_PU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for POREZ_PDV field
            //
            $editor = new TextEdit('porez_pdv_edit');
            $editColumn = new CustomEditColumn('POREZ PDV', 'POREZ_PDV', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRIMKE field
            //
            $editor = new TextEdit('sifra_primke_edit');
            $editColumn = new CustomEditColumn('SIFRA PRIMKE', 'SIFRA_PRIMKE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_STAVUG field
            //
            $editor = new TextEdit('sifra_stavug_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVUG', 'SIFRA_STAVUG', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for KOLICINA field
            //
            $column = new NumberViewColumn('KOLICINA', 'KOLICINA', 'KOLICINA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for CIJENA field
            //
            $column = new NumberViewColumn('CIJENA', 'CIJENA', 'CIJENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for RABAT field
            //
            $column = new NumberViewColumn('RABAT', 'RABAT', 'RABAT', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for POREZ_PP field
            //
            $column = new NumberViewColumn('POREZ_PP', 'POREZ_PP', 'POREZ PP', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for POREZ_PU field
            //
            $column = new NumberViewColumn('POREZ_PU', 'POREZ_PU', 'POREZ PU', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for POREZ_PDV field
            //
            $column = new NumberViewColumn('POREZ_PDV', 'POREZ_PDV', 'POREZ PDV', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_STAVUG field
            //
            $column = new NumberViewColumn('SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for KOLICINA field
            //
            $column = new NumberViewColumn('KOLICINA', 'KOLICINA', 'KOLICINA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for CIJENA field
            //
            $column = new NumberViewColumn('CIJENA', 'CIJENA', 'CIJENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for RABAT field
            //
            $column = new NumberViewColumn('RABAT', 'RABAT', 'RABAT', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for POREZ_PP field
            //
            $column = new NumberViewColumn('POREZ_PP', 'POREZ_PP', 'POREZ PP', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for POREZ_PU field
            //
            $column = new NumberViewColumn('POREZ_PU', 'POREZ_PU', 'POREZ PU', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for POREZ_PDV field
            //
            $column = new NumberViewColumn('POREZ_PDV', 'POREZ_PDV', 'POREZ PDV', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_STAVUG field
            //
            $column = new NumberViewColumn('SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for KOLICINA field
            //
            $column = new NumberViewColumn('KOLICINA', 'KOLICINA', 'KOLICINA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for CIJENA field
            //
            $column = new NumberViewColumn('CIJENA', 'CIJENA', 'CIJENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for RABAT field
            //
            $column = new NumberViewColumn('RABAT', 'RABAT', 'RABAT', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for POREZ_PP field
            //
            $column = new NumberViewColumn('POREZ_PP', 'POREZ_PP', 'POREZ PP', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for POREZ_PU field
            //
            $column = new NumberViewColumn('POREZ_PU', 'POREZ_PU', 'POREZ PU', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for POREZ_PDV field
            //
            $column = new NumberViewColumn('POREZ_PDV', 'POREZ_PDV', 'POREZ PDV', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_STAVUG field
            //
            $column = new NumberViewColumn('SIFRA_STAVUG', 'SIFRA_STAVUG', 'SIFRA STAVUG', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddToggleEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setAllowedActions(array('view', 'insert', 'copy', 'edit', 'multi-edit', 'delete', 'multi-delete'));
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(true);
            $this->setExportListAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }
    
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOGPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('T STAVKA IZDATNICE LOG');
            $this->SetMenuLabel('T STAVKA IZDATNICE LOG');
    
            $this->dataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_STAVKA_IZDATNICE_LOG"');
            $this->dataset->addFields(
                array(
                    new IntegerField('SIFRA_STAVKE_I', true, true),
                    new IntegerField('SIFRA_IZDATNICE', true),
                    new StringField('VRSTA_ARTIKLA', true),
                    new StringField('SIFRA_ARTIKLA', true),
                    new IntegerField('KOLICINA_U_MINUS', true)
                )
            );
            $this->dataset->AddLookupField('SIFRA_IZDATNICE', 'MERCEDES.T_IZDATNICA', new IntegerField('SIFRA_IZDATNICE'), new StringField('BROJ_IZDATNICE', false, false, false, false, 'LA1', 'LT1'), 'LT1');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I'),
                new FilterColumn($this->dataset, 'SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE'),
                new FilterColumn($this->dataset, 'VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA'),
                new FilterColumn($this->dataset, 'SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA'),
                new FilterColumn($this->dataset, 'KOLICINA_U_MINUS', 'KOLICINA_U_MINUS', 'KOLICINA U MINUS')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['SIFRA_STAVKE_I'])
                ->addColumn($columns['SIFRA_IZDATNICE'])
                ->addColumn($columns['VRSTA_ARTIKLA'])
                ->addColumn($columns['SIFRA_ARTIKLA'])
                ->addColumn($columns['KOLICINA_U_MINUS']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('SIFRA_IZDATNICE');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('sifra_stavke_i_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_STAVKE_I'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_SIFRA_IZDATNICE_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_IZDATNICE', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_SIFRA_IZDATNICE_search');
            
            $text_editor = new TextEdit('SIFRA_IZDATNICE');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_IZDATNICE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('vrsta_artikla_edit');
            $main_editor->SetMaxLength(1);
            
            $filterBuilder->addColumn(
                $columns['VRSTA_ARTIKLA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_artikla_edit');
            $main_editor->SetMaxLength(20);
            
            $filterBuilder->addColumn(
                $columns['SIFRA_ARTIKLA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('kolicina_u_minus_edit');
            
            $filterBuilder->addColumn(
                $columns['KOLICINA_U_MINUS'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->deleteOperationIsAllowed()) {
                $operation = new AjaxOperation(OPERATION_DELETE,
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'),
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'), $this->dataset,
                    $this->GetModalGridDeleteHandler(), $grid
                );
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
            }
            
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for KOLICINA_U_MINUS field
            //
            $column = new NumberViewColumn('KOLICINA_U_MINUS', 'KOLICINA_U_MINUS', 'KOLICINA U MINUS', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for KOLICINA_U_MINUS field
            //
            $column = new NumberViewColumn('KOLICINA_U_MINUS', 'KOLICINA_U_MINUS', 'KOLICINA U MINUS', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_STAVKE_I field
            //
            $editor = new TextEdit('sifra_stavke_i_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVKE I', 'SIFRA_STAVKE_I', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA1', 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for VRSTA_ARTIKLA field
            //
            $editor = new TextEdit('vrsta_artikla_edit');
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('VRSTA ARTIKLA', 'VRSTA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_ARTIKLA field
            //
            $editor = new TextEdit('sifra_artikla_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('SIFRA ARTIKLA', 'SIFRA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for KOLICINA_U_MINUS field
            //
            $editor = new TextEdit('kolicina_u_minus_edit');
            $editColumn = new CustomEditColumn('KOLICINA U MINUS', 'KOLICINA_U_MINUS', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA1', 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for VRSTA_ARTIKLA field
            //
            $editor = new TextEdit('vrsta_artikla_edit');
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('VRSTA ARTIKLA', 'VRSTA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_ARTIKLA field
            //
            $editor = new TextEdit('sifra_artikla_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('SIFRA ARTIKLA', 'SIFRA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for KOLICINA_U_MINUS field
            //
            $editor = new TextEdit('kolicina_u_minus_edit');
            $editColumn = new CustomEditColumn('KOLICINA U MINUS', 'KOLICINA_U_MINUS', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddToggleEditColumns(Grid $grid)
        {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_STAVKE_I field
            //
            $editor = new TextEdit('sifra_stavke_i_edit');
            $editColumn = new CustomEditColumn('SIFRA STAVKE I', 'SIFRA_STAVKE_I', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA1', 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for VRSTA_ARTIKLA field
            //
            $editor = new TextEdit('vrsta_artikla_edit');
            $editor->SetMaxLength(1);
            $editColumn = new CustomEditColumn('VRSTA ARTIKLA', 'VRSTA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_ARTIKLA field
            //
            $editor = new TextEdit('sifra_artikla_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('SIFRA ARTIKLA', 'SIFRA_ARTIKLA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for KOLICINA_U_MINUS field
            //
            $editor = new TextEdit('kolicina_u_minus_edit');
            $editColumn = new CustomEditColumn('KOLICINA U MINUS', 'KOLICINA_U_MINUS', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for KOLICINA_U_MINUS field
            //
            $column = new NumberViewColumn('KOLICINA_U_MINUS', 'KOLICINA_U_MINUS', 'KOLICINA U MINUS', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for KOLICINA_U_MINUS field
            //
            $column = new NumberViewColumn('KOLICINA_U_MINUS', 'KOLICINA_U_MINUS', 'KOLICINA U MINUS', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for SIFRA_STAVKE_I field
            //
            $column = new NumberViewColumn('SIFRA_STAVKE_I', 'SIFRA_STAVKE_I', 'SIFRA STAVKE I', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA1', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for VRSTA_ARTIKLA field
            //
            $column = new TextViewColumn('VRSTA_ARTIKLA', 'VRSTA_ARTIKLA', 'VRSTA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_ARTIKLA field
            //
            $column = new TextViewColumn('SIFRA_ARTIKLA', 'SIFRA_ARTIKLA', 'SIFRA ARTIKLA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for KOLICINA_U_MINUS field
            //
            $column = new NumberViewColumn('KOLICINA_U_MINUS', 'KOLICINA_U_MINUS', 'KOLICINA U MINUS', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddToggleEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setAllowedActions(array('view', 'insert', 'copy', 'edit', 'multi-edit', 'delete', 'multi-delete'));
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(true);
            $this->setExportListAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }
    
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKOPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('T VEZA IZD VEZA PKO');
            $this->SetMenuLabel('T VEZA IZD VEZA PKO');
    
            $this->dataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_IZD_VEZA_PKO"');
            $this->dataset->addFields(
                array(
                    new IntegerField('SIFRA_VIVPKO', true, true),
                    new IntegerField('SIFRA_VPKO'),
                    new IntegerField('SIFRA_IZDATNICE'),
                    new IntegerField('SIFRA_PRED'),
                    new IntegerField('SIFRA_NARUDZBE'),
                    new IntegerField('SIFRA_TIP_DOC'),
                    new StringField('VRSTA'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_REVERSA')
                )
            );
            $this->dataset->AddLookupField('SIFRA_VPKO', 'MERCEDES.T_VEZA_PRODMJ_KONT_OSOBE', new IntegerField('SIFRA_VPKO'), new IntegerField('SIFRA_KONT_OSOBE', false, false, false, false, 'LA1', 'LT1'), 'LT1');
            $this->dataset->AddLookupField('SIFRA_IZDATNICE', 'MERCEDES.T_IZDATNICA', new IntegerField('SIFRA_IZDATNICE'), new StringField('BROJ_IZDATNICE', false, false, false, false, 'LA2', 'LT2'), 'LT2');
            $this->dataset->AddLookupField('SIFRA_PRED', 'MERCEDES.T_PREDRACUN', new IntegerField('SIFRA_PRED'), new StringField('BROJ_PRED', false, false, false, false, 'LA3', 'LT3'), 'LT3');
            $this->dataset->AddLookupField('SIFRA_NARUDZBE', 'MERCEDES.T_NARUDZBA_KUPCA', new IntegerField('SIFRA_NARUDZBE'), new IntegerField('SIFRA_SEZONE', false, false, false, false, 'LA4', 'LT4'), 'LT4');
            $this->dataset->AddLookupField('SIFRA_REVERSA', 'MERCEDES.T_REVERS', new IntegerField('SIFRA_REVERSA'), new StringField('BROJ_REVERSA', false, false, false, false, 'LA5', 'LT5'), 'LT5');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'SIFRA_VIVPKO', 'SIFRA_VIVPKO', 'SIFRA VIVPKO'),
                new FilterColumn($this->dataset, 'SIFRA_VPKO', 'LA1', 'SIFRA VPKO'),
                new FilterColumn($this->dataset, 'SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE'),
                new FilterColumn($this->dataset, 'SIFRA_PRED', 'LA3', 'SIFRA PRED'),
                new FilterColumn($this->dataset, 'SIFRA_NARUDZBE', 'LA4', 'SIFRA NARUDZBE'),
                new FilterColumn($this->dataset, 'SIFRA_TIP_DOC', 'SIFRA_TIP_DOC', 'SIFRA TIP DOC'),
                new FilterColumn($this->dataset, 'VRSTA', 'VRSTA', 'VRSTA'),
                new FilterColumn($this->dataset, 'NAPOMENA', 'NAPOMENA', 'NAPOMENA'),
                new FilterColumn($this->dataset, 'SIFRA_REVERSA', 'LA5', 'SIFRA REVERSA')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['SIFRA_VIVPKO'])
                ->addColumn($columns['SIFRA_VPKO'])
                ->addColumn($columns['SIFRA_IZDATNICE'])
                ->addColumn($columns['SIFRA_PRED'])
                ->addColumn($columns['SIFRA_NARUDZBE'])
                ->addColumn($columns['SIFRA_TIP_DOC'])
                ->addColumn($columns['VRSTA'])
                ->addColumn($columns['NAPOMENA'])
                ->addColumn($columns['SIFRA_REVERSA']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('SIFRA_VPKO')
                ->setOptionsFor('SIFRA_IZDATNICE')
                ->setOptionsFor('SIFRA_PRED')
                ->setOptionsFor('SIFRA_NARUDZBE')
                ->setOptionsFor('SIFRA_REVERSA');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('sifra_vivpko_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_VIVPKO'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_vpko_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_VPKO_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_VPKO', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_VPKO_search');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_VPKO'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_IZDATNICE_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_IZDATNICE', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_IZDATNICE_search');
            
            $text_editor = new TextEdit('SIFRA_IZDATNICE');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_IZDATNICE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_pred_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_PRED_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_PRED', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_PRED_search');
            
            $text_editor = new TextEdit('SIFRA_PRED');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_PRED'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_narudzbe_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_NARUDZBE_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_NARUDZBE', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_NARUDZBE_search');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_NARUDZBE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_tip_doc_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_TIP_DOC'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('vrsta_edit');
            $main_editor->SetMaxLength(2);
            
            $filterBuilder->addColumn(
                $columns['VRSTA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('napomena_edit');
            $main_editor->SetMaxLength(50);
            
            $filterBuilder->addColumn(
                $columns['NAPOMENA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_reversa_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_REVERSA_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_REVERSA', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_REVERSA_search');
            
            $text_editor = new TextEdit('SIFRA_REVERSA');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_REVERSA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->deleteOperationIsAllowed()) {
                $operation = new AjaxOperation(OPERATION_DELETE,
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'),
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'), $this->dataset,
                    $this->GetModalGridDeleteHandler(), $grid
                );
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
            }
            
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for SIFRA_VIVPKO field
            //
            $column = new NumberViewColumn('SIFRA_VIVPKO', 'SIFRA_VIVPKO', 'SIFRA VIVPKO', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_KONT_OSOBE field
            //
            $column = new NumberViewColumn('SIFRA_VPKO', 'LA1', 'SIFRA VPKO', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for BROJ_PRED field
            //
            $column = new TextViewColumn('SIFRA_PRED', 'LA3', 'SIFRA PRED', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_SEZONE field
            //
            $column = new NumberViewColumn('SIFRA_NARUDZBE', 'LA4', 'SIFRA NARUDZBE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_TIP_DOC field
            //
            $column = new NumberViewColumn('SIFRA_TIP_DOC', 'SIFRA_TIP_DOC', 'SIFRA TIP DOC', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for VRSTA field
            //
            $column = new TextViewColumn('VRSTA', 'VRSTA', 'VRSTA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for BROJ_REVERSA field
            //
            $column = new TextViewColumn('SIFRA_REVERSA', 'LA5', 'SIFRA REVERSA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for SIFRA_VIVPKO field
            //
            $column = new NumberViewColumn('SIFRA_VIVPKO', 'SIFRA_VIVPKO', 'SIFRA VIVPKO', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_KONT_OSOBE field
            //
            $column = new NumberViewColumn('SIFRA_VPKO', 'LA1', 'SIFRA VPKO', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for BROJ_PRED field
            //
            $column = new TextViewColumn('SIFRA_PRED', 'LA3', 'SIFRA PRED', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_SEZONE field
            //
            $column = new NumberViewColumn('SIFRA_NARUDZBE', 'LA4', 'SIFRA NARUDZBE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_TIP_DOC field
            //
            $column = new NumberViewColumn('SIFRA_TIP_DOC', 'SIFRA_TIP_DOC', 'SIFRA TIP DOC', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for VRSTA field
            //
            $column = new TextViewColumn('VRSTA', 'VRSTA', 'VRSTA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for BROJ_REVERSA field
            //
            $column = new TextViewColumn('SIFRA_REVERSA', 'LA5', 'SIFRA REVERSA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_VIVPKO field
            //
            $editor = new TextEdit('sifra_vivpko_edit');
            $editColumn = new CustomEditColumn('SIFRA VIVPKO', 'SIFRA_VIVPKO', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_VPKO field
            //
            $editor = new DynamicCombobox('sifra_vpko_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_PRODMJ_KONT_OSOBE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VPKO', true, true),
                    new IntegerField('SIFRA_KONT_OSOBE', true),
                    new IntegerField('SIFRA_PRODMJ', true),
                    new DateTimeField('DATUM_OD_VPKO', true),
                    new DateTimeField('DATUM_DO_VPKO'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KONT_OSOBE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA VPKO', 'SIFRA_VPKO', 'LA1', 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_VPKO_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_VPKO', 'SIFRA_KONT_OSOBE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA2', 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRED field
            //
            $editor = new DynamicCombobox('sifra_pred_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PREDRACUN"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRED', true, true),
                    new StringField('BROJ_PRED', true),
                    new DateTimeField('DATUM_PRED', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('STORNO'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('NAPOMENA3'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_TECAJA'),
                    new StringField('SIFRA_VALUTE'),
                    new IntegerField('SIFRA_KOLONE')
                )
            );
            $lookupDataset->setOrderByField('BROJ_PRED', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA PRED', 'SIFRA_PRED', 'LA3', 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_PRED_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_PRED', 'BROJ_PRED', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_NARUDZBE field
            //
            $editor = new DynamicCombobox('sifra_narudzbe_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_NARUDZBA_KUPCA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_NARUDZBE', true, true),
                    new IntegerField('SIFRA_SEZONE', true),
                    new IntegerField('SIFRA_TIPA_NARUDZBE', true),
                    new IntegerField('SIFRA_KUPCA', true),
                    new IntegerField('STATUS_NAR', true),
                    new IntegerField('SIFRA_VRSTE_NARUDZBE', true),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new StringField('BROJ_NARUDZBE'),
                    new StringField('OSOBA'),
                    new StringField('ADRESA'),
                    new DateTimeField('DATUM_ISPORUKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_RADNIKA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_SEZONE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA NARUDZBE', 'SIFRA_NARUDZBE', 'LA4', 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_NARUDZBE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_NARUDZBE', 'SIFRA_SEZONE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_TIP_DOC field
            //
            $editor = new TextEdit('sifra_tip_doc_edit');
            $editColumn = new CustomEditColumn('SIFRA TIP DOC', 'SIFRA_TIP_DOC', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for VRSTA field
            //
            $editor = new TextEdit('vrsta_edit');
            $editor->SetMaxLength(2);
            $editColumn = new CustomEditColumn('VRSTA', 'VRSTA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextEdit('napomena_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_REVERSA field
            //
            $editor = new DynamicCombobox('sifra_reversa_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_REVERS"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_REVERSA', true, true),
                    new StringField('BROJ_REVERSA'),
                    new IntegerField('SIFRA_KUPCA_POSUDJUJE'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_SKLADI'),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_PRED'),
                    new IntegerField('SIFRA_UGOVORA'),
                    new DateTimeField('DATUM'),
                    new DateTimeField('DATUM_VRACANJA'),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('RABAT'),
                    new StringField('TEMELJEM'),
                    new StringField('NAPOMENA'),
                    new DateTimeField('DATUM_VRACENO')
                )
            );
            $lookupDataset->setOrderByField('BROJ_REVERSA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA REVERSA', 'SIFRA_REVERSA', 'LA5', 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_REVERSA_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_REVERSA', 'BROJ_REVERSA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_VPKO field
            //
            $editor = new DynamicCombobox('sifra_vpko_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_PRODMJ_KONT_OSOBE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VPKO', true, true),
                    new IntegerField('SIFRA_KONT_OSOBE', true),
                    new IntegerField('SIFRA_PRODMJ', true),
                    new DateTimeField('DATUM_OD_VPKO', true),
                    new DateTimeField('DATUM_DO_VPKO'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KONT_OSOBE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA VPKO', 'SIFRA_VPKO', 'LA1', 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_VPKO_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_VPKO', 'SIFRA_KONT_OSOBE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA2', 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRED field
            //
            $editor = new DynamicCombobox('sifra_pred_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PREDRACUN"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRED', true, true),
                    new StringField('BROJ_PRED', true),
                    new DateTimeField('DATUM_PRED', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('STORNO'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('NAPOMENA3'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_TECAJA'),
                    new StringField('SIFRA_VALUTE'),
                    new IntegerField('SIFRA_KOLONE')
                )
            );
            $lookupDataset->setOrderByField('BROJ_PRED', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA PRED', 'SIFRA_PRED', 'LA3', 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_PRED_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_PRED', 'BROJ_PRED', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_NARUDZBE field
            //
            $editor = new DynamicCombobox('sifra_narudzbe_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_NARUDZBA_KUPCA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_NARUDZBE', true, true),
                    new IntegerField('SIFRA_SEZONE', true),
                    new IntegerField('SIFRA_TIPA_NARUDZBE', true),
                    new IntegerField('SIFRA_KUPCA', true),
                    new IntegerField('STATUS_NAR', true),
                    new IntegerField('SIFRA_VRSTE_NARUDZBE', true),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new StringField('BROJ_NARUDZBE'),
                    new StringField('OSOBA'),
                    new StringField('ADRESA'),
                    new DateTimeField('DATUM_ISPORUKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_RADNIKA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_SEZONE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA NARUDZBE', 'SIFRA_NARUDZBE', 'LA4', 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_NARUDZBE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_NARUDZBE', 'SIFRA_SEZONE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_TIP_DOC field
            //
            $editor = new TextEdit('sifra_tip_doc_edit');
            $editColumn = new CustomEditColumn('SIFRA TIP DOC', 'SIFRA_TIP_DOC', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for VRSTA field
            //
            $editor = new TextEdit('vrsta_edit');
            $editor->SetMaxLength(2);
            $editColumn = new CustomEditColumn('VRSTA', 'VRSTA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextEdit('napomena_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_REVERSA field
            //
            $editor = new DynamicCombobox('sifra_reversa_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_REVERS"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_REVERSA', true, true),
                    new StringField('BROJ_REVERSA'),
                    new IntegerField('SIFRA_KUPCA_POSUDJUJE'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_SKLADI'),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_PRED'),
                    new IntegerField('SIFRA_UGOVORA'),
                    new DateTimeField('DATUM'),
                    new DateTimeField('DATUM_VRACANJA'),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('RABAT'),
                    new StringField('TEMELJEM'),
                    new StringField('NAPOMENA'),
                    new DateTimeField('DATUM_VRACENO')
                )
            );
            $lookupDataset->setOrderByField('BROJ_REVERSA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA REVERSA', 'SIFRA_REVERSA', 'LA5', 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_REVERSA_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_REVERSA', 'BROJ_REVERSA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddToggleEditColumns(Grid $grid)
        {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_VIVPKO field
            //
            $editor = new TextEdit('sifra_vivpko_edit');
            $editColumn = new CustomEditColumn('SIFRA VIVPKO', 'SIFRA_VIVPKO', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_VPKO field
            //
            $editor = new DynamicCombobox('sifra_vpko_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_PRODMJ_KONT_OSOBE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VPKO', true, true),
                    new IntegerField('SIFRA_KONT_OSOBE', true),
                    new IntegerField('SIFRA_PRODMJ', true),
                    new DateTimeField('DATUM_OD_VPKO', true),
                    new DateTimeField('DATUM_DO_VPKO'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KONT_OSOBE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA VPKO', 'SIFRA_VPKO', 'LA1', 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_VPKO_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_VPKO', 'SIFRA_KONT_OSOBE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA2', 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRED field
            //
            $editor = new DynamicCombobox('sifra_pred_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PREDRACUN"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRED', true, true),
                    new StringField('BROJ_PRED', true),
                    new DateTimeField('DATUM_PRED', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('STORNO'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('NAPOMENA3'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_TECAJA'),
                    new StringField('SIFRA_VALUTE'),
                    new IntegerField('SIFRA_KOLONE')
                )
            );
            $lookupDataset->setOrderByField('BROJ_PRED', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA PRED', 'SIFRA_PRED', 'LA3', 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_PRED_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_PRED', 'BROJ_PRED', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_NARUDZBE field
            //
            $editor = new DynamicCombobox('sifra_narudzbe_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_NARUDZBA_KUPCA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_NARUDZBE', true, true),
                    new IntegerField('SIFRA_SEZONE', true),
                    new IntegerField('SIFRA_TIPA_NARUDZBE', true),
                    new IntegerField('SIFRA_KUPCA', true),
                    new IntegerField('STATUS_NAR', true),
                    new IntegerField('SIFRA_VRSTE_NARUDZBE', true),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new StringField('BROJ_NARUDZBE'),
                    new StringField('OSOBA'),
                    new StringField('ADRESA'),
                    new DateTimeField('DATUM_ISPORUKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_RADNIKA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_SEZONE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA NARUDZBE', 'SIFRA_NARUDZBE', 'LA4', 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_NARUDZBE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_NARUDZBE', 'SIFRA_SEZONE', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_TIP_DOC field
            //
            $editor = new TextEdit('sifra_tip_doc_edit');
            $editColumn = new CustomEditColumn('SIFRA TIP DOC', 'SIFRA_TIP_DOC', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for VRSTA field
            //
            $editor = new TextEdit('vrsta_edit');
            $editor->SetMaxLength(2);
            $editColumn = new CustomEditColumn('VRSTA', 'VRSTA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextEdit('napomena_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_REVERSA field
            //
            $editor = new DynamicCombobox('sifra_reversa_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_REVERS"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_REVERSA', true, true),
                    new StringField('BROJ_REVERSA'),
                    new IntegerField('SIFRA_KUPCA_POSUDJUJE'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_SKLADI'),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_PRED'),
                    new IntegerField('SIFRA_UGOVORA'),
                    new DateTimeField('DATUM'),
                    new DateTimeField('DATUM_VRACANJA'),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('RABAT'),
                    new StringField('TEMELJEM'),
                    new StringField('NAPOMENA'),
                    new DateTimeField('DATUM_VRACENO')
                )
            );
            $lookupDataset->setOrderByField('BROJ_REVERSA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA REVERSA', 'SIFRA_REVERSA', 'LA5', 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_REVERSA_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_REVERSA', 'BROJ_REVERSA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for SIFRA_VIVPKO field
            //
            $column = new NumberViewColumn('SIFRA_VIVPKO', 'SIFRA_VIVPKO', 'SIFRA VIVPKO', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_KONT_OSOBE field
            //
            $column = new NumberViewColumn('SIFRA_VPKO', 'LA1', 'SIFRA VPKO', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for BROJ_PRED field
            //
            $column = new TextViewColumn('SIFRA_PRED', 'LA3', 'SIFRA PRED', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_SEZONE field
            //
            $column = new NumberViewColumn('SIFRA_NARUDZBE', 'LA4', 'SIFRA NARUDZBE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_TIP_DOC field
            //
            $column = new NumberViewColumn('SIFRA_TIP_DOC', 'SIFRA_TIP_DOC', 'SIFRA TIP DOC', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for VRSTA field
            //
            $column = new TextViewColumn('VRSTA', 'VRSTA', 'VRSTA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for BROJ_REVERSA field
            //
            $column = new TextViewColumn('SIFRA_REVERSA', 'LA5', 'SIFRA REVERSA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for SIFRA_VIVPKO field
            //
            $column = new NumberViewColumn('SIFRA_VIVPKO', 'SIFRA_VIVPKO', 'SIFRA VIVPKO', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_KONT_OSOBE field
            //
            $column = new NumberViewColumn('SIFRA_VPKO', 'LA1', 'SIFRA VPKO', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for BROJ_PRED field
            //
            $column = new TextViewColumn('SIFRA_PRED', 'LA3', 'SIFRA PRED', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_SEZONE field
            //
            $column = new NumberViewColumn('SIFRA_NARUDZBE', 'LA4', 'SIFRA NARUDZBE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_TIP_DOC field
            //
            $column = new NumberViewColumn('SIFRA_TIP_DOC', 'SIFRA_TIP_DOC', 'SIFRA TIP DOC', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for VRSTA field
            //
            $column = new TextViewColumn('VRSTA', 'VRSTA', 'VRSTA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for BROJ_REVERSA field
            //
            $column = new TextViewColumn('SIFRA_REVERSA', 'LA5', 'SIFRA REVERSA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for SIFRA_VIVPKO field
            //
            $column = new NumberViewColumn('SIFRA_VIVPKO', 'SIFRA_VIVPKO', 'SIFRA VIVPKO', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_KONT_OSOBE field
            //
            $column = new NumberViewColumn('SIFRA_VPKO', 'LA1', 'SIFRA VPKO', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for BROJ_PRED field
            //
            $column = new TextViewColumn('SIFRA_PRED', 'LA3', 'SIFRA PRED', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_SEZONE field
            //
            $column = new NumberViewColumn('SIFRA_NARUDZBE', 'LA4', 'SIFRA NARUDZBE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_TIP_DOC field
            //
            $column = new NumberViewColumn('SIFRA_TIP_DOC', 'SIFRA_TIP_DOC', 'SIFRA TIP DOC', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for VRSTA field
            //
            $column = new TextViewColumn('VRSTA', 'VRSTA', 'VRSTA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for BROJ_REVERSA field
            //
            $column = new TextViewColumn('SIFRA_REVERSA', 'LA5', 'SIFRA REVERSA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddToggleEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setAllowedActions(array('view', 'insert', 'copy', 'edit', 'multi-edit', 'delete', 'multi-delete'));
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(true);
            $this->setExportListAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_PRODMJ_KONT_OSOBE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VPKO', true, true),
                    new IntegerField('SIFRA_KONT_OSOBE', true),
                    new IntegerField('SIFRA_PRODMJ', true),
                    new DateTimeField('DATUM_OD_VPKO', true),
                    new DateTimeField('DATUM_DO_VPKO'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KONT_OSOBE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_VPKO_search', 'SIFRA_VPKO', 'SIFRA_KONT_OSOBE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PREDRACUN"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRED', true, true),
                    new StringField('BROJ_PRED', true),
                    new DateTimeField('DATUM_PRED', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('STORNO'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('NAPOMENA3'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_TECAJA'),
                    new StringField('SIFRA_VALUTE'),
                    new IntegerField('SIFRA_KOLONE')
                )
            );
            $lookupDataset->setOrderByField('BROJ_PRED', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_PRED_search', 'SIFRA_PRED', 'BROJ_PRED', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_NARUDZBA_KUPCA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_NARUDZBE', true, true),
                    new IntegerField('SIFRA_SEZONE', true),
                    new IntegerField('SIFRA_TIPA_NARUDZBE', true),
                    new IntegerField('SIFRA_KUPCA', true),
                    new IntegerField('STATUS_NAR', true),
                    new IntegerField('SIFRA_VRSTE_NARUDZBE', true),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new StringField('BROJ_NARUDZBE'),
                    new StringField('OSOBA'),
                    new StringField('ADRESA'),
                    new DateTimeField('DATUM_ISPORUKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_RADNIKA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_SEZONE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_NARUDZBE_search', 'SIFRA_NARUDZBE', 'SIFRA_SEZONE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_REVERS"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_REVERSA', true, true),
                    new StringField('BROJ_REVERSA'),
                    new IntegerField('SIFRA_KUPCA_POSUDJUJE'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_SKLADI'),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_PRED'),
                    new IntegerField('SIFRA_UGOVORA'),
                    new DateTimeField('DATUM'),
                    new DateTimeField('DATUM_VRACANJA'),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('RABAT'),
                    new StringField('TEMELJEM'),
                    new StringField('NAPOMENA'),
                    new DateTimeField('DATUM_VRACENO')
                )
            );
            $lookupDataset->setOrderByField('BROJ_REVERSA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_REVERSA_search', 'SIFRA_REVERSA', 'BROJ_REVERSA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_PRODMJ_KONT_OSOBE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VPKO', true, true),
                    new IntegerField('SIFRA_KONT_OSOBE', true),
                    new IntegerField('SIFRA_PRODMJ', true),
                    new DateTimeField('DATUM_OD_VPKO', true),
                    new DateTimeField('DATUM_DO_VPKO'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KONT_OSOBE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_VPKO_search', 'SIFRA_VPKO', 'SIFRA_KONT_OSOBE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PREDRACUN"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRED', true, true),
                    new StringField('BROJ_PRED', true),
                    new DateTimeField('DATUM_PRED', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('STORNO'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('NAPOMENA3'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_TECAJA'),
                    new StringField('SIFRA_VALUTE'),
                    new IntegerField('SIFRA_KOLONE')
                )
            );
            $lookupDataset->setOrderByField('BROJ_PRED', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_PRED_search', 'SIFRA_PRED', 'BROJ_PRED', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_NARUDZBA_KUPCA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_NARUDZBE', true, true),
                    new IntegerField('SIFRA_SEZONE', true),
                    new IntegerField('SIFRA_TIPA_NARUDZBE', true),
                    new IntegerField('SIFRA_KUPCA', true),
                    new IntegerField('STATUS_NAR', true),
                    new IntegerField('SIFRA_VRSTE_NARUDZBE', true),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new StringField('BROJ_NARUDZBE'),
                    new StringField('OSOBA'),
                    new StringField('ADRESA'),
                    new DateTimeField('DATUM_ISPORUKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_RADNIKA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_SEZONE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_NARUDZBE_search', 'SIFRA_NARUDZBE', 'SIFRA_SEZONE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_REVERS"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_REVERSA', true, true),
                    new StringField('BROJ_REVERSA'),
                    new IntegerField('SIFRA_KUPCA_POSUDJUJE'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_SKLADI'),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_PRED'),
                    new IntegerField('SIFRA_UGOVORA'),
                    new DateTimeField('DATUM'),
                    new DateTimeField('DATUM_VRACANJA'),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('RABAT'),
                    new StringField('TEMELJEM'),
                    new StringField('NAPOMENA'),
                    new DateTimeField('DATUM_VRACENO')
                )
            );
            $lookupDataset->setOrderByField('BROJ_REVERSA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_REVERSA_search', 'SIFRA_REVERSA', 'BROJ_REVERSA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_PRODMJ_KONT_OSOBE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VPKO', true, true),
                    new IntegerField('SIFRA_KONT_OSOBE', true),
                    new IntegerField('SIFRA_PRODMJ', true),
                    new DateTimeField('DATUM_OD_VPKO', true),
                    new DateTimeField('DATUM_DO_VPKO'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KONT_OSOBE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_VPKO_search', 'SIFRA_VPKO', 'SIFRA_KONT_OSOBE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PREDRACUN"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRED', true, true),
                    new StringField('BROJ_PRED', true),
                    new DateTimeField('DATUM_PRED', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('STORNO'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('NAPOMENA3'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_TECAJA'),
                    new StringField('SIFRA_VALUTE'),
                    new IntegerField('SIFRA_KOLONE')
                )
            );
            $lookupDataset->setOrderByField('BROJ_PRED', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_PRED_search', 'SIFRA_PRED', 'BROJ_PRED', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_NARUDZBA_KUPCA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_NARUDZBE', true, true),
                    new IntegerField('SIFRA_SEZONE', true),
                    new IntegerField('SIFRA_TIPA_NARUDZBE', true),
                    new IntegerField('SIFRA_KUPCA', true),
                    new IntegerField('STATUS_NAR', true),
                    new IntegerField('SIFRA_VRSTE_NARUDZBE', true),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new StringField('BROJ_NARUDZBE'),
                    new StringField('OSOBA'),
                    new StringField('ADRESA'),
                    new DateTimeField('DATUM_ISPORUKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_RADNIKA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_SEZONE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_NARUDZBE_search', 'SIFRA_NARUDZBE', 'SIFRA_SEZONE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_REVERS"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_REVERSA', true, true),
                    new StringField('BROJ_REVERSA'),
                    new IntegerField('SIFRA_KUPCA_POSUDJUJE'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_SKLADI'),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_PRED'),
                    new IntegerField('SIFRA_UGOVORA'),
                    new DateTimeField('DATUM'),
                    new DateTimeField('DATUM_VRACANJA'),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('RABAT'),
                    new StringField('TEMELJEM'),
                    new StringField('NAPOMENA'),
                    new DateTimeField('DATUM_VRACENO')
                )
            );
            $lookupDataset->setOrderByField('BROJ_REVERSA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_REVERSA_search', 'SIFRA_REVERSA', 'BROJ_REVERSA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_PRODMJ_KONT_OSOBE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VPKO', true, true),
                    new IntegerField('SIFRA_KONT_OSOBE', true),
                    new IntegerField('SIFRA_PRODMJ', true),
                    new DateTimeField('DATUM_OD_VPKO', true),
                    new DateTimeField('DATUM_DO_VPKO'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KONT_OSOBE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_VPKO_search', 'SIFRA_VPKO', 'SIFRA_KONT_OSOBE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PREDRACUN"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRED', true, true),
                    new StringField('BROJ_PRED', true),
                    new DateTimeField('DATUM_PRED', true),
                    new IntegerField('SIFRA_NAC_PLAC', true),
                    new DateTimeField('DATUM_VALUTE', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('RABAT'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_IZJAVE'),
                    new StringField('BROJ_IZJAVE'),
                    new DateTimeField('DATUM_IZJAVE'),
                    new StringField('STORNO'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('NAPOMENA3'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_TECAJA'),
                    new StringField('SIFRA_VALUTE'),
                    new IntegerField('SIFRA_KOLONE')
                )
            );
            $lookupDataset->setOrderByField('BROJ_PRED', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_PRED_search', 'SIFRA_PRED', 'BROJ_PRED', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_NARUDZBA_KUPCA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_NARUDZBE', true, true),
                    new IntegerField('SIFRA_SEZONE', true),
                    new IntegerField('SIFRA_TIPA_NARUDZBE', true),
                    new IntegerField('SIFRA_KUPCA', true),
                    new IntegerField('STATUS_NAR', true),
                    new IntegerField('SIFRA_VRSTE_NARUDZBE', true),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new StringField('BROJ_NARUDZBE'),
                    new StringField('OSOBA'),
                    new StringField('ADRESA'),
                    new DateTimeField('DATUM_ISPORUKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_RADNIKA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_SEZONE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_NARUDZBE_search', 'SIFRA_NARUDZBE', 'SIFRA_SEZONE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_REVERS"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_REVERSA', true, true),
                    new StringField('BROJ_REVERSA'),
                    new IntegerField('SIFRA_KUPCA_POSUDJUJE'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_SKLADI'),
                    new IntegerField('SIFRA_NAC_PLAC'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_PRED'),
                    new IntegerField('SIFRA_UGOVORA'),
                    new DateTimeField('DATUM'),
                    new DateTimeField('DATUM_VRACANJA'),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('RABAT'),
                    new StringField('TEMELJEM'),
                    new StringField('NAPOMENA'),
                    new DateTimeField('DATUM_VRACENO')
                )
            );
            $lookupDataset->setOrderByField('BROJ_REVERSA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_SIFRA_REVERSA_search', 'SIFRA_REVERSA', 'BROJ_REVERSA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }
    
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZDPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('T VEZA PRIJAVA IZD');
            $this->SetMenuLabel('T VEZA PRIJAVA IZD');
    
            $this->dataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_PRIJAVA_IZD"');
            $this->dataset->addFields(
                array(
                    new IntegerField('SIFRA_PRIJAVE_IZD', true, true),
                    new IntegerField('SIFRA_PRIJAVE', true),
                    new IntegerField('SIFRA_IZDATNICE', true),
                    new StringField('NAPOMENA')
                )
            );
            $this->dataset->AddLookupField('SIFRA_PRIJAVE', 'MERCEDES.T_PRIJAVA_GOST_PROSTOR', new IntegerField('SIFRA_PRIJAVE'), new IntegerField('SIFRA_STAV_HOTELREZER', false, false, false, false, 'LA1', 'LT1'), 'LT1');
            $this->dataset->AddLookupField('SIFRA_IZDATNICE', 'MERCEDES.T_IZDATNICA', new IntegerField('SIFRA_IZDATNICE'), new StringField('BROJ_IZDATNICE', false, false, false, false, 'LA2', 'LT2'), 'LT2');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'SIFRA_PRIJAVE_IZD', 'SIFRA_PRIJAVE_IZD', 'SIFRA PRIJAVE IZD'),
                new FilterColumn($this->dataset, 'SIFRA_PRIJAVE', 'LA1', 'SIFRA PRIJAVE'),
                new FilterColumn($this->dataset, 'SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE'),
                new FilterColumn($this->dataset, 'NAPOMENA', 'NAPOMENA', 'NAPOMENA')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['SIFRA_PRIJAVE_IZD'])
                ->addColumn($columns['SIFRA_PRIJAVE'])
                ->addColumn($columns['SIFRA_IZDATNICE'])
                ->addColumn($columns['NAPOMENA']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('SIFRA_PRIJAVE')
                ->setOptionsFor('SIFRA_IZDATNICE');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('sifra_prijave_izd_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_PRIJAVE_IZD'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_prijave_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_PRIJAVE_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_PRIJAVE', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_PRIJAVE_search');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_PRIJAVE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_IZDATNICE_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_IZDATNICE', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_IZDATNICE_search');
            
            $text_editor = new TextEdit('SIFRA_IZDATNICE');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_IZDATNICE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('NAPOMENA');
            
            $filterBuilder->addColumn(
                $columns['NAPOMENA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->deleteOperationIsAllowed()) {
                $operation = new AjaxOperation(OPERATION_DELETE,
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'),
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'), $this->dataset,
                    $this->GetModalGridDeleteHandler(), $grid
                );
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
            }
            
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for SIFRA_PRIJAVE_IZD field
            //
            $column = new NumberViewColumn('SIFRA_PRIJAVE_IZD', 'SIFRA_PRIJAVE_IZD', 'SIFRA PRIJAVE IZD', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_STAV_HOTELREZER field
            //
            $column = new NumberViewColumn('SIFRA_PRIJAVE', 'LA1', 'SIFRA PRIJAVE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for SIFRA_PRIJAVE_IZD field
            //
            $column = new NumberViewColumn('SIFRA_PRIJAVE_IZD', 'SIFRA_PRIJAVE_IZD', 'SIFRA PRIJAVE IZD', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_STAV_HOTELREZER field
            //
            $column = new NumberViewColumn('SIFRA_PRIJAVE', 'LA1', 'SIFRA PRIJAVE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_PRIJAVE_IZD field
            //
            $editor = new TextEdit('sifra_prijave_izd_edit');
            $editColumn = new CustomEditColumn('SIFRA PRIJAVE IZD', 'SIFRA_PRIJAVE_IZD', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRIJAVE field
            //
            $editor = new DynamicCombobox('sifra_prijave_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRIJAVA_GOST_PROSTOR"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRIJAVE', true, true),
                    new IntegerField('SIFRA_STAV_HOTELREZER'),
                    new IntegerField('SIFRA_GOSTA', true),
                    new IntegerField('SIFRA_VRS_PROSTORA', true),
                    new IntegerField('SIFRA_PROSTORA'),
                    new IntegerField('SIFRA_VRS_GOSTA', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_RADNIKA', true),
                    new IntegerField('SIFRA_SLUZBE'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_STATUSA'),
                    new IntegerField('SIFRA_HOT_VUSLUGE'),
                    new StringField('USER_UNIO'),
                    new DateTimeField('DATUM_UNIO'),
                    new StringField('USER_PROMJ'),
                    new DateTimeField('DATUM_PROMJ'),
                    new StringField('OZNAKA_PRIJAVEGP'),
                    new IntegerField('POSTO_BORAV_TAKSE'),
                    new IntegerField('BROJ_NOCENJA'),
                    new IntegerField('BROJ_POM_LEZAJA'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('ADRESA_BORAVKA_U_RH'),
                    new StringField('MJESTO_ULASKA_U_RH'),
                    new DateTimeField('DATUM_ULASKA_U_RH'),
                    new DateTimeField('DATUM_PRIJAVE_TUR_ZAJ'),
                    new DateTimeField('DATUM_ODJAVE'),
                    new DateTimeField('DATUMOD_PLAN'),
                    new DateTimeField('DATUMDO_PLAN'),
                    new DateTimeField('DATUMOD'),
                    new DateTimeField('DATUMDO'),
                    new StringField('NAPOMENA1'),
                    new StringField('NAPOMENA2')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_STAV_HOTELREZER', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA PRIJAVE', 'SIFRA_PRIJAVE', 'LA1', 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_PRIJAVE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_PRIJAVE', 'SIFRA_STAV_HOTELREZER', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA2', 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextAreaEdit('napomena_edit', 50, 8);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_PRIJAVE field
            //
            $editor = new DynamicCombobox('sifra_prijave_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRIJAVA_GOST_PROSTOR"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRIJAVE', true, true),
                    new IntegerField('SIFRA_STAV_HOTELREZER'),
                    new IntegerField('SIFRA_GOSTA', true),
                    new IntegerField('SIFRA_VRS_PROSTORA', true),
                    new IntegerField('SIFRA_PROSTORA'),
                    new IntegerField('SIFRA_VRS_GOSTA', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_RADNIKA', true),
                    new IntegerField('SIFRA_SLUZBE'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_STATUSA'),
                    new IntegerField('SIFRA_HOT_VUSLUGE'),
                    new StringField('USER_UNIO'),
                    new DateTimeField('DATUM_UNIO'),
                    new StringField('USER_PROMJ'),
                    new DateTimeField('DATUM_PROMJ'),
                    new StringField('OZNAKA_PRIJAVEGP'),
                    new IntegerField('POSTO_BORAV_TAKSE'),
                    new IntegerField('BROJ_NOCENJA'),
                    new IntegerField('BROJ_POM_LEZAJA'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('ADRESA_BORAVKA_U_RH'),
                    new StringField('MJESTO_ULASKA_U_RH'),
                    new DateTimeField('DATUM_ULASKA_U_RH'),
                    new DateTimeField('DATUM_PRIJAVE_TUR_ZAJ'),
                    new DateTimeField('DATUM_ODJAVE'),
                    new DateTimeField('DATUMOD_PLAN'),
                    new DateTimeField('DATUMDO_PLAN'),
                    new DateTimeField('DATUMOD'),
                    new DateTimeField('DATUMDO'),
                    new StringField('NAPOMENA1'),
                    new StringField('NAPOMENA2')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_STAV_HOTELREZER', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA PRIJAVE', 'SIFRA_PRIJAVE', 'LA1', 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_PRIJAVE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_PRIJAVE', 'SIFRA_STAV_HOTELREZER', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA2', 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextAreaEdit('napomena_edit', 50, 8);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddToggleEditColumns(Grid $grid)
        {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_PRIJAVE_IZD field
            //
            $editor = new TextEdit('sifra_prijave_izd_edit');
            $editColumn = new CustomEditColumn('SIFRA PRIJAVE IZD', 'SIFRA_PRIJAVE_IZD', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRIJAVE field
            //
            $editor = new DynamicCombobox('sifra_prijave_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRIJAVA_GOST_PROSTOR"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRIJAVE', true, true),
                    new IntegerField('SIFRA_STAV_HOTELREZER'),
                    new IntegerField('SIFRA_GOSTA', true),
                    new IntegerField('SIFRA_VRS_PROSTORA', true),
                    new IntegerField('SIFRA_PROSTORA'),
                    new IntegerField('SIFRA_VRS_GOSTA', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_RADNIKA', true),
                    new IntegerField('SIFRA_SLUZBE'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_STATUSA'),
                    new IntegerField('SIFRA_HOT_VUSLUGE'),
                    new StringField('USER_UNIO'),
                    new DateTimeField('DATUM_UNIO'),
                    new StringField('USER_PROMJ'),
                    new DateTimeField('DATUM_PROMJ'),
                    new StringField('OZNAKA_PRIJAVEGP'),
                    new IntegerField('POSTO_BORAV_TAKSE'),
                    new IntegerField('BROJ_NOCENJA'),
                    new IntegerField('BROJ_POM_LEZAJA'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('ADRESA_BORAVKA_U_RH'),
                    new StringField('MJESTO_ULASKA_U_RH'),
                    new DateTimeField('DATUM_ULASKA_U_RH'),
                    new DateTimeField('DATUM_PRIJAVE_TUR_ZAJ'),
                    new DateTimeField('DATUM_ODJAVE'),
                    new DateTimeField('DATUMOD_PLAN'),
                    new DateTimeField('DATUMDO_PLAN'),
                    new DateTimeField('DATUMOD'),
                    new DateTimeField('DATUMDO'),
                    new StringField('NAPOMENA1'),
                    new StringField('NAPOMENA2')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_STAV_HOTELREZER', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA PRIJAVE', 'SIFRA_PRIJAVE', 'LA1', 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_PRIJAVE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_PRIJAVE', 'SIFRA_STAV_HOTELREZER', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new DynamicCombobox('sifra_izdatnice_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', 'LA2', 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_IZDATNICE_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextAreaEdit('napomena_edit', 50, 8);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for SIFRA_PRIJAVE_IZD field
            //
            $column = new NumberViewColumn('SIFRA_PRIJAVE_IZD', 'SIFRA_PRIJAVE_IZD', 'SIFRA PRIJAVE IZD', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_STAV_HOTELREZER field
            //
            $column = new NumberViewColumn('SIFRA_PRIJAVE', 'LA1', 'SIFRA PRIJAVE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for SIFRA_PRIJAVE_IZD field
            //
            $column = new NumberViewColumn('SIFRA_PRIJAVE_IZD', 'SIFRA_PRIJAVE_IZD', 'SIFRA PRIJAVE IZD', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_STAV_HOTELREZER field
            //
            $column = new NumberViewColumn('SIFRA_PRIJAVE', 'LA1', 'SIFRA PRIJAVE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for SIFRA_PRIJAVE_IZD field
            //
            $column = new NumberViewColumn('SIFRA_PRIJAVE_IZD', 'SIFRA_PRIJAVE_IZD', 'SIFRA PRIJAVE IZD', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_STAV_HOTELREZER field
            //
            $column = new NumberViewColumn('SIFRA_PRIJAVE', 'LA1', 'SIFRA PRIJAVE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('SIFRA_IZDATNICE', 'LA2', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddToggleEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setAllowedActions(array('view', 'insert', 'copy', 'edit', 'multi-edit', 'delete', 'multi-delete'));
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(true);
            $this->setExportListAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRIJAVA_GOST_PROSTOR"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRIJAVE', true, true),
                    new IntegerField('SIFRA_STAV_HOTELREZER'),
                    new IntegerField('SIFRA_GOSTA', true),
                    new IntegerField('SIFRA_VRS_PROSTORA', true),
                    new IntegerField('SIFRA_PROSTORA'),
                    new IntegerField('SIFRA_VRS_GOSTA', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_RADNIKA', true),
                    new IntegerField('SIFRA_SLUZBE'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_STATUSA'),
                    new IntegerField('SIFRA_HOT_VUSLUGE'),
                    new StringField('USER_UNIO'),
                    new DateTimeField('DATUM_UNIO'),
                    new StringField('USER_PROMJ'),
                    new DateTimeField('DATUM_PROMJ'),
                    new StringField('OZNAKA_PRIJAVEGP'),
                    new IntegerField('POSTO_BORAV_TAKSE'),
                    new IntegerField('BROJ_NOCENJA'),
                    new IntegerField('BROJ_POM_LEZAJA'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('ADRESA_BORAVKA_U_RH'),
                    new StringField('MJESTO_ULASKA_U_RH'),
                    new DateTimeField('DATUM_ULASKA_U_RH'),
                    new DateTimeField('DATUM_PRIJAVE_TUR_ZAJ'),
                    new DateTimeField('DATUM_ODJAVE'),
                    new DateTimeField('DATUMOD_PLAN'),
                    new DateTimeField('DATUMDO_PLAN'),
                    new DateTimeField('DATUMOD'),
                    new DateTimeField('DATUMDO'),
                    new StringField('NAPOMENA1'),
                    new StringField('NAPOMENA2')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_STAV_HOTELREZER', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_PRIJAVE_search', 'SIFRA_PRIJAVE', 'SIFRA_STAV_HOTELREZER', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRIJAVA_GOST_PROSTOR"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRIJAVE', true, true),
                    new IntegerField('SIFRA_STAV_HOTELREZER'),
                    new IntegerField('SIFRA_GOSTA', true),
                    new IntegerField('SIFRA_VRS_PROSTORA', true),
                    new IntegerField('SIFRA_PROSTORA'),
                    new IntegerField('SIFRA_VRS_GOSTA', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_RADNIKA', true),
                    new IntegerField('SIFRA_SLUZBE'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_STATUSA'),
                    new IntegerField('SIFRA_HOT_VUSLUGE'),
                    new StringField('USER_UNIO'),
                    new DateTimeField('DATUM_UNIO'),
                    new StringField('USER_PROMJ'),
                    new DateTimeField('DATUM_PROMJ'),
                    new StringField('OZNAKA_PRIJAVEGP'),
                    new IntegerField('POSTO_BORAV_TAKSE'),
                    new IntegerField('BROJ_NOCENJA'),
                    new IntegerField('BROJ_POM_LEZAJA'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('ADRESA_BORAVKA_U_RH'),
                    new StringField('MJESTO_ULASKA_U_RH'),
                    new DateTimeField('DATUM_ULASKA_U_RH'),
                    new DateTimeField('DATUM_PRIJAVE_TUR_ZAJ'),
                    new DateTimeField('DATUM_ODJAVE'),
                    new DateTimeField('DATUMOD_PLAN'),
                    new DateTimeField('DATUMDO_PLAN'),
                    new DateTimeField('DATUMOD'),
                    new DateTimeField('DATUMDO'),
                    new StringField('NAPOMENA1'),
                    new StringField('NAPOMENA2')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_STAV_HOTELREZER', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_PRIJAVE_search', 'SIFRA_PRIJAVE', 'SIFRA_STAV_HOTELREZER', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRIJAVA_GOST_PROSTOR"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRIJAVE', true, true),
                    new IntegerField('SIFRA_STAV_HOTELREZER'),
                    new IntegerField('SIFRA_GOSTA', true),
                    new IntegerField('SIFRA_VRS_PROSTORA', true),
                    new IntegerField('SIFRA_PROSTORA'),
                    new IntegerField('SIFRA_VRS_GOSTA', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_RADNIKA', true),
                    new IntegerField('SIFRA_SLUZBE'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_STATUSA'),
                    new IntegerField('SIFRA_HOT_VUSLUGE'),
                    new StringField('USER_UNIO'),
                    new DateTimeField('DATUM_UNIO'),
                    new StringField('USER_PROMJ'),
                    new DateTimeField('DATUM_PROMJ'),
                    new StringField('OZNAKA_PRIJAVEGP'),
                    new IntegerField('POSTO_BORAV_TAKSE'),
                    new IntegerField('BROJ_NOCENJA'),
                    new IntegerField('BROJ_POM_LEZAJA'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('ADRESA_BORAVKA_U_RH'),
                    new StringField('MJESTO_ULASKA_U_RH'),
                    new DateTimeField('DATUM_ULASKA_U_RH'),
                    new DateTimeField('DATUM_PRIJAVE_TUR_ZAJ'),
                    new DateTimeField('DATUM_ODJAVE'),
                    new DateTimeField('DATUMOD_PLAN'),
                    new DateTimeField('DATUMDO_PLAN'),
                    new DateTimeField('DATUMOD'),
                    new DateTimeField('DATUMDO'),
                    new StringField('NAPOMENA1'),
                    new StringField('NAPOMENA2')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_STAV_HOTELREZER', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_PRIJAVE_search', 'SIFRA_PRIJAVE', 'SIFRA_STAV_HOTELREZER', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRIJAVA_GOST_PROSTOR"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRIJAVE', true, true),
                    new IntegerField('SIFRA_STAV_HOTELREZER'),
                    new IntegerField('SIFRA_GOSTA', true),
                    new IntegerField('SIFRA_VRS_PROSTORA', true),
                    new IntegerField('SIFRA_PROSTORA'),
                    new IntegerField('SIFRA_VRS_GOSTA', true),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_RADNIKA', true),
                    new IntegerField('SIFRA_SLUZBE'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_STATUSA'),
                    new IntegerField('SIFRA_HOT_VUSLUGE'),
                    new StringField('USER_UNIO'),
                    new DateTimeField('DATUM_UNIO'),
                    new StringField('USER_PROMJ'),
                    new DateTimeField('DATUM_PROMJ'),
                    new StringField('OZNAKA_PRIJAVEGP'),
                    new IntegerField('POSTO_BORAV_TAKSE'),
                    new IntegerField('BROJ_NOCENJA'),
                    new IntegerField('BROJ_POM_LEZAJA'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('ADRESA_BORAVKA_U_RH'),
                    new StringField('MJESTO_ULASKA_U_RH'),
                    new DateTimeField('DATUM_ULASKA_U_RH'),
                    new DateTimeField('DATUM_PRIJAVE_TUR_ZAJ'),
                    new DateTimeField('DATUM_ODJAVE'),
                    new DateTimeField('DATUMOD_PLAN'),
                    new DateTimeField('DATUMDO_PLAN'),
                    new DateTimeField('DATUMOD'),
                    new DateTimeField('DATUMDO'),
                    new StringField('NAPOMENA1'),
                    new StringField('NAPOMENA2')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_STAV_HOTELREZER', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_PRIJAVE_search', 'SIFRA_PRIJAVE', 'SIFRA_STAV_HOTELREZER', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $lookupDataset->setOrderByField('BROJ_IZDATNICE', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_SIFRA_IZDATNICE_search', 'SIFRA_IZDATNICE', 'BROJ_IZDATNICE', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }
    
    // OnBeforePageExecute event handler
    
    
    
    class MERCEDES_T_IZDATNICAPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('T IZDATNICA');
            $this->SetMenuLabel('T IZDATNICA');
    
            $this->dataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_IZDATNICA"');
            $this->dataset->addFields(
                array(
                    new IntegerField('SIFRA_IZDATNICE', true, true),
                    new StringField('BROJ_IZDATNICE', true),
                    new IntegerField('SIFRA_RACUNA'),
                    new IntegerField('SIFRA_IFA'),
                    new IntegerField('SIFRA_KUPCA'),
                    new IntegerField('SIFRA_TIP_DOC', true),
                    new IntegerField('SIFRA_SKLADI'),
                    new StringField('BROJ_SASIJE'),
                    new DateTimeField('DATUM', true),
                    new IntegerField('SIFRA_SERVISA'),
                    new IntegerField('SIFRA_RADNIKA'),
                    new IntegerField('SIFRA_PRIMKE'),
                    new StringField('NAPOMENA'),
                    new IntegerField('SIFRA_PRODMJ'),
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'),
                    new IntegerField('SIFRA_VEZE_OBJUGOVOR')
                )
            );
            $this->dataset->AddLookupField('SIFRA_TIP_DOC', 'MERCEDES.T_TIP_DOC', new IntegerField('SIFRA_TIP_DOC'), new StringField('OPIS', false, false, false, false, 'LA1', 'LT1'), 'LT1');
            $this->dataset->AddLookupField('SIFRA_SKLADI', 'MERCEDES.T_SKLADISTE', new IntegerField('SIFRA_SKLADI'), new IntegerField('SIFRA_VRST_SKL', false, false, false, false, 'LA2', 'LT2'), 'LT2');
            $this->dataset->AddLookupField('SIFRA_RADNIKA', 'MERCEDES.T_RADNIK', new IntegerField('SIFRA_RADNIKA'), new StringField('IME_RADNIKA', false, false, false, false, 'LA3', 'LT3'), 'LT3');
            $this->dataset->AddLookupField('SIFRA_PRODMJ', 'MERCEDES.T_PRODAJNO_MJESTO', new IntegerField('SIFRA_PRODMJ'), new IntegerField('SIFRA_KUPCA', false, false, false, false, 'LA4', 'LT4'), 'LT4');
            $this->dataset->AddLookupField('SIFRA_VEZE_VLASNIK_VOZ', 'MERCEDES.T_VEZA_VLASNIK_VOZILO', new IntegerField('SIFRA_VEZE_VLASNIK_VOZ'), new IntegerField('SIFRA_VLASNIKA', false, false, false, false, 'LA5', 'LT5'), 'LT5');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'SIFRA_IZDATNICE', 'SIFRA_IZDATNICE', 'SIFRA IZDATNICE'),
                new FilterColumn($this->dataset, 'BROJ_IZDATNICE', 'BROJ_IZDATNICE', 'BROJ IZDATNICE'),
                new FilterColumn($this->dataset, 'SIFRA_RACUNA', 'SIFRA_RACUNA', 'SIFRA RACUNA'),
                new FilterColumn($this->dataset, 'SIFRA_IFA', 'SIFRA_IFA', 'SIFRA IFA'),
                new FilterColumn($this->dataset, 'SIFRA_KUPCA', 'SIFRA_KUPCA', 'SIFRA KUPCA'),
                new FilterColumn($this->dataset, 'SIFRA_TIP_DOC', 'LA1', 'SIFRA TIP DOC'),
                new FilterColumn($this->dataset, 'SIFRA_SKLADI', 'LA2', 'SIFRA SKLADI'),
                new FilterColumn($this->dataset, 'BROJ_SASIJE', 'BROJ_SASIJE', 'BROJ SASIJE'),
                new FilterColumn($this->dataset, 'DATUM', 'DATUM', 'DATUM'),
                new FilterColumn($this->dataset, 'SIFRA_SERVISA', 'SIFRA_SERVISA', 'SIFRA SERVISA'),
                new FilterColumn($this->dataset, 'SIFRA_RADNIKA', 'LA3', 'SIFRA RADNIKA'),
                new FilterColumn($this->dataset, 'SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE'),
                new FilterColumn($this->dataset, 'NAPOMENA', 'NAPOMENA', 'NAPOMENA'),
                new FilterColumn($this->dataset, 'SIFRA_PRODMJ', 'LA4', 'SIFRA PRODMJ'),
                new FilterColumn($this->dataset, 'SIFRA_VEZE_VLASNIK_VOZ', 'LA5', 'SIFRA VEZE VLASNIK VOZ'),
                new FilterColumn($this->dataset, 'SIFRA_VEZE_OBJUGOVOR', 'SIFRA_VEZE_OBJUGOVOR', 'SIFRA VEZE OBJUGOVOR')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['SIFRA_IZDATNICE'])
                ->addColumn($columns['BROJ_IZDATNICE'])
                ->addColumn($columns['SIFRA_RACUNA'])
                ->addColumn($columns['SIFRA_IFA'])
                ->addColumn($columns['SIFRA_KUPCA'])
                ->addColumn($columns['SIFRA_TIP_DOC'])
                ->addColumn($columns['SIFRA_SKLADI'])
                ->addColumn($columns['BROJ_SASIJE'])
                ->addColumn($columns['DATUM'])
                ->addColumn($columns['SIFRA_SERVISA'])
                ->addColumn($columns['SIFRA_RADNIKA'])
                ->addColumn($columns['SIFRA_PRIMKE'])
                ->addColumn($columns['NAPOMENA'])
                ->addColumn($columns['SIFRA_PRODMJ'])
                ->addColumn($columns['SIFRA_VEZE_VLASNIK_VOZ'])
                ->addColumn($columns['SIFRA_VEZE_OBJUGOVOR']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('SIFRA_TIP_DOC')
                ->setOptionsFor('SIFRA_SKLADI')
                ->setOptionsFor('DATUM')
                ->setOptionsFor('SIFRA_RADNIKA')
                ->setOptionsFor('SIFRA_PRODMJ')
                ->setOptionsFor('SIFRA_VEZE_VLASNIK_VOZ');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('sifra_izdatnice_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_IZDATNICE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('broj_izdatnice_edit');
            $main_editor->SetMaxLength(10);
            
            $filterBuilder->addColumn(
                $columns['BROJ_IZDATNICE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_racuna_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_RACUNA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_ifa_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_IFA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_kupca_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_KUPCA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_tip_doc_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_SIFRA_TIP_DOC_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_TIP_DOC', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_SIFRA_TIP_DOC_search');
            
            $text_editor = new TextEdit('SIFRA_TIP_DOC');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_TIP_DOC'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_skladi_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_SIFRA_SKLADI_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_SKLADI', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_SIFRA_SKLADI_search');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_SKLADI'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('broj_sasije_edit');
            $main_editor->SetMaxLength(30);
            
            $filterBuilder->addColumn(
                $columns['BROJ_SASIJE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DateTimeEdit('datum_edit', false, 'Y-m-d H:i:s');
            
            $filterBuilder->addColumn(
                $columns['DATUM'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::DATE_EQUALS => $main_editor,
                    FilterConditionOperator::DATE_DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::TODAY => null,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_servisa_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_SERVISA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_radnika_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_SIFRA_RADNIKA_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_RADNIKA', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_SIFRA_RADNIKA_search');
            
            $text_editor = new TextEdit('SIFRA_RADNIKA');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_RADNIKA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_primke_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_PRIMKE'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('NAPOMENA');
            
            $filterBuilder->addColumn(
                $columns['NAPOMENA'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_prodmj_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_SIFRA_PRODMJ_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_PRODMJ', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_SIFRA_PRODMJ_search');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_PRODMJ'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('sifra_veze_vlasnik_voz_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_SIFRA_VEZE_VLASNIK_VOZ_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('SIFRA_VEZE_VLASNIK_VOZ', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_MERCEDES_T_IZDATNICA_SIFRA_VEZE_VLASNIK_VOZ_search');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_VEZE_VLASNIK_VOZ'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('sifra_veze_objugovor_edit');
            
            $filterBuilder->addColumn(
                $columns['SIFRA_VEZE_OBJUGOVOR'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->deleteOperationIsAllowed()) {
                $operation = new AjaxOperation(OPERATION_DELETE,
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'),
                    $this->GetLocalizerCaptions()->GetMessageString('Delete'), $this->dataset,
                    $this->GetModalGridDeleteHandler(), $grid
                );
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
            }
            
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            if (GetCurrentUserPermissionsForPage('MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IFE')->HasViewGrant() && $withDetails)
            {
            //
            // View column for MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE detail
            //
            $column = new DetailColumn(array('SIFRA_IZDATNICE'), 'MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IFE', 'MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_handler', $this->dataset, 'T STAVKA IFE');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            if (GetCurrentUserPermissionsForPage('MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IZDATNICE')->HasViewGrant() && $withDetails)
            {
            //
            // View column for MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE detail
            //
            $column = new DetailColumn(array('SIFRA_IZDATNICE'), 'MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IZDATNICE', 'MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_handler', $this->dataset, 'T STAVKA IZDATNICE');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            if (GetCurrentUserPermissionsForPage('MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IZDATNICE_LOG')->HasViewGrant() && $withDetails)
            {
            //
            // View column for MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG detail
            //
            $column = new DetailColumn(array('SIFRA_IZDATNICE'), 'MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IZDATNICE_LOG', 'MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_handler', $this->dataset, 'T STAVKA IZDATNICE LOG');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            if (GetCurrentUserPermissionsForPage('MERCEDES.T_IZDATNICA.MERCEDES.T_VEZA_IZD_VEZA_PKO')->HasViewGrant() && $withDetails)
            {
            //
            // View column for MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO detail
            //
            $column = new DetailColumn(array('SIFRA_IZDATNICE'), 'MERCEDES.T_IZDATNICA.MERCEDES.T_VEZA_IZD_VEZA_PKO', 'MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_handler', $this->dataset, 'T VEZA IZD VEZA PKO');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            if (GetCurrentUserPermissionsForPage('MERCEDES.T_IZDATNICA.MERCEDES.T_VEZA_PRIJAVA_IZD')->HasViewGrant() && $withDetails)
            {
            //
            // View column for MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD detail
            //
            $column = new DetailColumn(array('SIFRA_IZDATNICE'), 'MERCEDES.T_IZDATNICA.MERCEDES.T_VEZA_PRIJAVA_IZD', 'MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_handler', $this->dataset, 'T VEZA PRIJAVA IZD');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            //
            // View column for SIFRA_IZDATNICE field
            //
            $column = new NumberViewColumn('SIFRA_IZDATNICE', 'SIFRA_IZDATNICE', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('BROJ_IZDATNICE', 'BROJ_IZDATNICE', 'BROJ IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_RACUNA field
            //
            $column = new NumberViewColumn('SIFRA_RACUNA', 'SIFRA_RACUNA', 'SIFRA RACUNA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_IFA field
            //
            $column = new NumberViewColumn('SIFRA_IFA', 'SIFRA_IFA', 'SIFRA IFA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_KUPCA field
            //
            $column = new NumberViewColumn('SIFRA_KUPCA', 'SIFRA_KUPCA', 'SIFRA KUPCA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for OPIS field
            //
            $column = new TextViewColumn('SIFRA_TIP_DOC', 'LA1', 'SIFRA TIP DOC', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_VRST_SKL field
            //
            $column = new NumberViewColumn('SIFRA_SKLADI', 'LA2', 'SIFRA SKLADI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for BROJ_SASIJE field
            //
            $column = new TextViewColumn('BROJ_SASIJE', 'BROJ_SASIJE', 'BROJ SASIJE', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for DATUM field
            //
            $column = new DateTimeViewColumn('DATUM', 'DATUM', 'DATUM', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_SERVISA field
            //
            $column = new NumberViewColumn('SIFRA_SERVISA', 'SIFRA_SERVISA', 'SIFRA SERVISA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for IME_RADNIKA field
            //
            $column = new TextViewColumn('SIFRA_RADNIKA', 'LA3', 'SIFRA RADNIKA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_KUPCA field
            //
            $column = new NumberViewColumn('SIFRA_PRODMJ', 'LA4', 'SIFRA PRODMJ', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_VLASNIKA field
            //
            $column = new NumberViewColumn('SIFRA_VEZE_VLASNIK_VOZ', 'LA5', 'SIFRA VEZE VLASNIK VOZ', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            //
            // View column for SIFRA_VEZE_OBJUGOVOR field
            //
            $column = new NumberViewColumn('SIFRA_VEZE_OBJUGOVOR', 'SIFRA_VEZE_OBJUGOVOR', 'SIFRA VEZE OBJUGOVOR', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for SIFRA_IZDATNICE field
            //
            $column = new NumberViewColumn('SIFRA_IZDATNICE', 'SIFRA_IZDATNICE', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('BROJ_IZDATNICE', 'BROJ_IZDATNICE', 'BROJ IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_RACUNA field
            //
            $column = new NumberViewColumn('SIFRA_RACUNA', 'SIFRA_RACUNA', 'SIFRA RACUNA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_IFA field
            //
            $column = new NumberViewColumn('SIFRA_IFA', 'SIFRA_IFA', 'SIFRA IFA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_KUPCA field
            //
            $column = new NumberViewColumn('SIFRA_KUPCA', 'SIFRA_KUPCA', 'SIFRA KUPCA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for OPIS field
            //
            $column = new TextViewColumn('SIFRA_TIP_DOC', 'LA1', 'SIFRA TIP DOC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_VRST_SKL field
            //
            $column = new NumberViewColumn('SIFRA_SKLADI', 'LA2', 'SIFRA SKLADI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for BROJ_SASIJE field
            //
            $column = new TextViewColumn('BROJ_SASIJE', 'BROJ_SASIJE', 'BROJ SASIJE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DATUM field
            //
            $column = new DateTimeViewColumn('DATUM', 'DATUM', 'DATUM', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_SERVISA field
            //
            $column = new NumberViewColumn('SIFRA_SERVISA', 'SIFRA_SERVISA', 'SIFRA SERVISA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for IME_RADNIKA field
            //
            $column = new TextViewColumn('SIFRA_RADNIKA', 'LA3', 'SIFRA RADNIKA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_KUPCA field
            //
            $column = new NumberViewColumn('SIFRA_PRODMJ', 'LA4', 'SIFRA PRODMJ', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_VLASNIKA field
            //
            $column = new NumberViewColumn('SIFRA_VEZE_VLASNIK_VOZ', 'LA5', 'SIFRA VEZE VLASNIK VOZ', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SIFRA_VEZE_OBJUGOVOR field
            //
            $column = new NumberViewColumn('SIFRA_VEZE_OBJUGOVOR', 'SIFRA_VEZE_OBJUGOVOR', 'SIFRA VEZE OBJUGOVOR', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new TextEdit('sifra_izdatnice_edit');
            $editColumn = new CustomEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for BROJ_IZDATNICE field
            //
            $editor = new TextEdit('broj_izdatnice_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('BROJ IZDATNICE', 'BROJ_IZDATNICE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_RACUNA field
            //
            $editor = new TextEdit('sifra_racuna_edit');
            $editColumn = new CustomEditColumn('SIFRA RACUNA', 'SIFRA_RACUNA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_IFA field
            //
            $editor = new TextEdit('sifra_ifa_edit');
            $editColumn = new CustomEditColumn('SIFRA IFA', 'SIFRA_IFA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_KUPCA field
            //
            $editor = new TextEdit('sifra_kupca_edit');
            $editColumn = new CustomEditColumn('SIFRA KUPCA', 'SIFRA_KUPCA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_TIP_DOC field
            //
            $editor = new DynamicCombobox('sifra_tip_doc_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_TIP_DOC"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_TIP_DOC', true, true),
                    new StringField('OPIS', true)
                )
            );
            $lookupDataset->setOrderByField('OPIS', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA TIP DOC', 'SIFRA_TIP_DOC', 'LA1', 'edit_MERCEDES_T_IZDATNICA_SIFRA_TIP_DOC_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_TIP_DOC', 'OPIS', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_SKLADI field
            //
            $editor = new DynamicCombobox('sifra_skladi_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_SKLADISTE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_SKLADI', true, true),
                    new IntegerField('SIFRA_VRST_SKL', true),
                    new StringField('NAZIV'),
                    new StringField('BROJ_SKL', true),
                    new IntegerField('SIFRA_POSLOVNICE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new StringField('TELEFON2'),
                    new StringField('MOBITEL'),
                    new StringField('MOBITEL2'),
                    new StringField('MOBITEL3'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('EMAIL'),
                    new StringField('EMAIL2'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('BROJ_POSTE'),
                    new StringField('BROJ_KUCE')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VRST_SKL', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA SKLADI', 'SIFRA_SKLADI', 'LA2', 'edit_MERCEDES_T_IZDATNICA_SIFRA_SKLADI_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_SKLADI', 'SIFRA_VRST_SKL', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for BROJ_SASIJE field
            //
            $editor = new TextEdit('broj_sasije_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('BROJ SASIJE', 'BROJ_SASIJE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for DATUM field
            //
            $editor = new DateTimeEdit('datum_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('DATUM', 'DATUM', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_SERVISA field
            //
            $editor = new TextEdit('sifra_servisa_edit');
            $editColumn = new CustomEditColumn('SIFRA SERVISA', 'SIFRA_SERVISA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_RADNIKA field
            //
            $editor = new DynamicCombobox('sifra_radnika_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_RADNIK"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_RADNIKA', true, true),
                    new StringField('IME_RADNIKA', true),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new IntegerField('SIFRA_RAD_MJ'),
                    new StringField('ZAPORKA'),
                    new StringField('TELEFON_1'),
                    new StringField('FAX'),
                    new StringField('EMAIL'),
                    new StringField('ZVANJE'),
                    new IntegerField('SIFRA_STR_SPREME'),
                    new StringField('NAPOMENA'),
                    new StringField('JMBG'),
                    new StringField('VRSTA')
                )
            );
            $lookupDataset->setOrderByField('IME_RADNIKA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA RADNIKA', 'SIFRA_RADNIKA', 'LA3', 'edit_MERCEDES_T_IZDATNICA_SIFRA_RADNIKA_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_RADNIKA', 'IME_RADNIKA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRIMKE field
            //
            $editor = new TextEdit('sifra_primke_edit');
            $editColumn = new CustomEditColumn('SIFRA PRIMKE', 'SIFRA_PRIMKE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextAreaEdit('napomena_edit', 50, 8);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRODMJ field
            //
            $editor = new DynamicCombobox('sifra_prodmj_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRODAJNO_MJESTO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRODMJ', true, true),
                    new IntegerField('SIFRA_KUPCA'),
                    new StringField('NAZIV_PRODMJ'),
                    new StringField('ZAPRIMANJE_TJEDNO'),
                    new StringField('PRODMJ_SEZONSKO'),
                    new StringField('ZNACAJ'),
                    new StringField('BROJ_PRODMJ'),
                    new StringField('TIP_IZVJESTAJA'),
                    new StringField('BROJ_POSTE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('BROJ_KUCE'),
                    new StringField('TELEFON'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('NAPOMENA'),
                    new StringField('ZIRO_RACUN'),
                    new StringField('EMAIL'),
                    new StringField('IBAN')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KUPCA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA PRODMJ', 'SIFRA_PRODMJ', 'LA4', 'edit_MERCEDES_T_IZDATNICA_SIFRA_PRODMJ_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_PRODMJ', 'SIFRA_KUPCA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_VEZE_VLASNIK_VOZ field
            //
            $editor = new DynamicCombobox('sifra_veze_vlasnik_voz_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_VLASNIK_VOZILO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ', true, true),
                    new IntegerField('SIFRA_VLASNIKA', true),
                    new StringField('BROJ_SASIJE', true),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('KORISNIK'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VLASNIKA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA VEZE VLASNIK VOZ', 'SIFRA_VEZE_VLASNIK_VOZ', 'LA5', 'edit_MERCEDES_T_IZDATNICA_SIFRA_VEZE_VLASNIK_VOZ_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_VEZE_VLASNIK_VOZ', 'SIFRA_VLASNIKA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_VEZE_OBJUGOVOR field
            //
            $editor = new TextEdit('sifra_veze_objugovor_edit');
            $editColumn = new CustomEditColumn('SIFRA VEZE OBJUGOVOR', 'SIFRA_VEZE_OBJUGOVOR', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for BROJ_IZDATNICE field
            //
            $editor = new TextEdit('broj_izdatnice_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('BROJ IZDATNICE', 'BROJ_IZDATNICE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_RACUNA field
            //
            $editor = new TextEdit('sifra_racuna_edit');
            $editColumn = new CustomEditColumn('SIFRA RACUNA', 'SIFRA_RACUNA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_IFA field
            //
            $editor = new TextEdit('sifra_ifa_edit');
            $editColumn = new CustomEditColumn('SIFRA IFA', 'SIFRA_IFA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_KUPCA field
            //
            $editor = new TextEdit('sifra_kupca_edit');
            $editColumn = new CustomEditColumn('SIFRA KUPCA', 'SIFRA_KUPCA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_TIP_DOC field
            //
            $editor = new DynamicCombobox('sifra_tip_doc_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_TIP_DOC"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_TIP_DOC', true, true),
                    new StringField('OPIS', true)
                )
            );
            $lookupDataset->setOrderByField('OPIS', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA TIP DOC', 'SIFRA_TIP_DOC', 'LA1', 'multi_edit_MERCEDES_T_IZDATNICA_SIFRA_TIP_DOC_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_TIP_DOC', 'OPIS', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_SKLADI field
            //
            $editor = new DynamicCombobox('sifra_skladi_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_SKLADISTE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_SKLADI', true, true),
                    new IntegerField('SIFRA_VRST_SKL', true),
                    new StringField('NAZIV'),
                    new StringField('BROJ_SKL', true),
                    new IntegerField('SIFRA_POSLOVNICE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new StringField('TELEFON2'),
                    new StringField('MOBITEL'),
                    new StringField('MOBITEL2'),
                    new StringField('MOBITEL3'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('EMAIL'),
                    new StringField('EMAIL2'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('BROJ_POSTE'),
                    new StringField('BROJ_KUCE')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VRST_SKL', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA SKLADI', 'SIFRA_SKLADI', 'LA2', 'multi_edit_MERCEDES_T_IZDATNICA_SIFRA_SKLADI_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_SKLADI', 'SIFRA_VRST_SKL', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for BROJ_SASIJE field
            //
            $editor = new TextEdit('broj_sasije_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('BROJ SASIJE', 'BROJ_SASIJE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for DATUM field
            //
            $editor = new DateTimeEdit('datum_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('DATUM', 'DATUM', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_SERVISA field
            //
            $editor = new TextEdit('sifra_servisa_edit');
            $editColumn = new CustomEditColumn('SIFRA SERVISA', 'SIFRA_SERVISA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_RADNIKA field
            //
            $editor = new DynamicCombobox('sifra_radnika_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_RADNIK"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_RADNIKA', true, true),
                    new StringField('IME_RADNIKA', true),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new IntegerField('SIFRA_RAD_MJ'),
                    new StringField('ZAPORKA'),
                    new StringField('TELEFON_1'),
                    new StringField('FAX'),
                    new StringField('EMAIL'),
                    new StringField('ZVANJE'),
                    new IntegerField('SIFRA_STR_SPREME'),
                    new StringField('NAPOMENA'),
                    new StringField('JMBG'),
                    new StringField('VRSTA')
                )
            );
            $lookupDataset->setOrderByField('IME_RADNIKA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA RADNIKA', 'SIFRA_RADNIKA', 'LA3', 'multi_edit_MERCEDES_T_IZDATNICA_SIFRA_RADNIKA_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_RADNIKA', 'IME_RADNIKA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRIMKE field
            //
            $editor = new TextEdit('sifra_primke_edit');
            $editColumn = new CustomEditColumn('SIFRA PRIMKE', 'SIFRA_PRIMKE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextAreaEdit('napomena_edit', 50, 8);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRODMJ field
            //
            $editor = new DynamicCombobox('sifra_prodmj_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRODAJNO_MJESTO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRODMJ', true, true),
                    new IntegerField('SIFRA_KUPCA'),
                    new StringField('NAZIV_PRODMJ'),
                    new StringField('ZAPRIMANJE_TJEDNO'),
                    new StringField('PRODMJ_SEZONSKO'),
                    new StringField('ZNACAJ'),
                    new StringField('BROJ_PRODMJ'),
                    new StringField('TIP_IZVJESTAJA'),
                    new StringField('BROJ_POSTE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('BROJ_KUCE'),
                    new StringField('TELEFON'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('NAPOMENA'),
                    new StringField('ZIRO_RACUN'),
                    new StringField('EMAIL'),
                    new StringField('IBAN')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KUPCA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA PRODMJ', 'SIFRA_PRODMJ', 'LA4', 'multi_edit_MERCEDES_T_IZDATNICA_SIFRA_PRODMJ_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_PRODMJ', 'SIFRA_KUPCA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_VEZE_VLASNIK_VOZ field
            //
            $editor = new DynamicCombobox('sifra_veze_vlasnik_voz_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_VLASNIK_VOZILO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ', true, true),
                    new IntegerField('SIFRA_VLASNIKA', true),
                    new StringField('BROJ_SASIJE', true),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('KORISNIK'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VLASNIKA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA VEZE VLASNIK VOZ', 'SIFRA_VEZE_VLASNIK_VOZ', 'LA5', 'multi_edit_MERCEDES_T_IZDATNICA_SIFRA_VEZE_VLASNIK_VOZ_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_VEZE_VLASNIK_VOZ', 'SIFRA_VLASNIKA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for SIFRA_VEZE_OBJUGOVOR field
            //
            $editor = new TextEdit('sifra_veze_objugovor_edit');
            $editColumn = new CustomEditColumn('SIFRA VEZE OBJUGOVOR', 'SIFRA_VEZE_OBJUGOVOR', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddToggleEditColumns(Grid $grid)
        {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for SIFRA_IZDATNICE field
            //
            $editor = new TextEdit('sifra_izdatnice_edit');
            $editColumn = new CustomEditColumn('SIFRA IZDATNICE', 'SIFRA_IZDATNICE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for BROJ_IZDATNICE field
            //
            $editor = new TextEdit('broj_izdatnice_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('BROJ IZDATNICE', 'BROJ_IZDATNICE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_RACUNA field
            //
            $editor = new TextEdit('sifra_racuna_edit');
            $editColumn = new CustomEditColumn('SIFRA RACUNA', 'SIFRA_RACUNA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_IFA field
            //
            $editor = new TextEdit('sifra_ifa_edit');
            $editColumn = new CustomEditColumn('SIFRA IFA', 'SIFRA_IFA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_KUPCA field
            //
            $editor = new TextEdit('sifra_kupca_edit');
            $editColumn = new CustomEditColumn('SIFRA KUPCA', 'SIFRA_KUPCA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_TIP_DOC field
            //
            $editor = new DynamicCombobox('sifra_tip_doc_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_TIP_DOC"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_TIP_DOC', true, true),
                    new StringField('OPIS', true)
                )
            );
            $lookupDataset->setOrderByField('OPIS', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA TIP DOC', 'SIFRA_TIP_DOC', 'LA1', 'insert_MERCEDES_T_IZDATNICA_SIFRA_TIP_DOC_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_TIP_DOC', 'OPIS', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_SKLADI field
            //
            $editor = new DynamicCombobox('sifra_skladi_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_SKLADISTE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_SKLADI', true, true),
                    new IntegerField('SIFRA_VRST_SKL', true),
                    new StringField('NAZIV'),
                    new StringField('BROJ_SKL', true),
                    new IntegerField('SIFRA_POSLOVNICE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new StringField('TELEFON2'),
                    new StringField('MOBITEL'),
                    new StringField('MOBITEL2'),
                    new StringField('MOBITEL3'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('EMAIL'),
                    new StringField('EMAIL2'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('BROJ_POSTE'),
                    new StringField('BROJ_KUCE')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VRST_SKL', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA SKLADI', 'SIFRA_SKLADI', 'LA2', 'insert_MERCEDES_T_IZDATNICA_SIFRA_SKLADI_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_SKLADI', 'SIFRA_VRST_SKL', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for BROJ_SASIJE field
            //
            $editor = new TextEdit('broj_sasije_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('BROJ SASIJE', 'BROJ_SASIJE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for DATUM field
            //
            $editor = new DateTimeEdit('datum_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('DATUM', 'DATUM', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_SERVISA field
            //
            $editor = new TextEdit('sifra_servisa_edit');
            $editColumn = new CustomEditColumn('SIFRA SERVISA', 'SIFRA_SERVISA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_RADNIKA field
            //
            $editor = new DynamicCombobox('sifra_radnika_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_RADNIK"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_RADNIKA', true, true),
                    new StringField('IME_RADNIKA', true),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new IntegerField('SIFRA_RAD_MJ'),
                    new StringField('ZAPORKA'),
                    new StringField('TELEFON_1'),
                    new StringField('FAX'),
                    new StringField('EMAIL'),
                    new StringField('ZVANJE'),
                    new IntegerField('SIFRA_STR_SPREME'),
                    new StringField('NAPOMENA'),
                    new StringField('JMBG'),
                    new StringField('VRSTA')
                )
            );
            $lookupDataset->setOrderByField('IME_RADNIKA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA RADNIKA', 'SIFRA_RADNIKA', 'LA3', 'insert_MERCEDES_T_IZDATNICA_SIFRA_RADNIKA_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_RADNIKA', 'IME_RADNIKA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRIMKE field
            //
            $editor = new TextEdit('sifra_primke_edit');
            $editColumn = new CustomEditColumn('SIFRA PRIMKE', 'SIFRA_PRIMKE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for NAPOMENA field
            //
            $editor = new TextAreaEdit('napomena_edit', 50, 8);
            $editColumn = new CustomEditColumn('NAPOMENA', 'NAPOMENA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_PRODMJ field
            //
            $editor = new DynamicCombobox('sifra_prodmj_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRODAJNO_MJESTO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRODMJ', true, true),
                    new IntegerField('SIFRA_KUPCA'),
                    new StringField('NAZIV_PRODMJ'),
                    new StringField('ZAPRIMANJE_TJEDNO'),
                    new StringField('PRODMJ_SEZONSKO'),
                    new StringField('ZNACAJ'),
                    new StringField('BROJ_PRODMJ'),
                    new StringField('TIP_IZVJESTAJA'),
                    new StringField('BROJ_POSTE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('BROJ_KUCE'),
                    new StringField('TELEFON'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('NAPOMENA'),
                    new StringField('ZIRO_RACUN'),
                    new StringField('EMAIL'),
                    new StringField('IBAN')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KUPCA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA PRODMJ', 'SIFRA_PRODMJ', 'LA4', 'insert_MERCEDES_T_IZDATNICA_SIFRA_PRODMJ_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_PRODMJ', 'SIFRA_KUPCA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_VEZE_VLASNIK_VOZ field
            //
            $editor = new DynamicCombobox('sifra_veze_vlasnik_voz_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_VLASNIK_VOZILO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ', true, true),
                    new IntegerField('SIFRA_VLASNIKA', true),
                    new StringField('BROJ_SASIJE', true),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('KORISNIK'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VLASNIKA', 'ASC');
            $editColumn = new DynamicLookupEditColumn('SIFRA VEZE VLASNIK VOZ', 'SIFRA_VEZE_VLASNIK_VOZ', 'LA5', 'insert_MERCEDES_T_IZDATNICA_SIFRA_VEZE_VLASNIK_VOZ_search', $editor, $this->dataset, $lookupDataset, 'SIFRA_VEZE_VLASNIK_VOZ', 'SIFRA_VLASNIKA', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SIFRA_VEZE_OBJUGOVOR field
            //
            $editor = new TextEdit('sifra_veze_objugovor_edit');
            $editColumn = new CustomEditColumn('SIFRA VEZE OBJUGOVOR', 'SIFRA_VEZE_OBJUGOVOR', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for SIFRA_IZDATNICE field
            //
            $column = new NumberViewColumn('SIFRA_IZDATNICE', 'SIFRA_IZDATNICE', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('BROJ_IZDATNICE', 'BROJ_IZDATNICE', 'BROJ IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_RACUNA field
            //
            $column = new NumberViewColumn('SIFRA_RACUNA', 'SIFRA_RACUNA', 'SIFRA RACUNA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_IFA field
            //
            $column = new NumberViewColumn('SIFRA_IFA', 'SIFRA_IFA', 'SIFRA IFA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_KUPCA field
            //
            $column = new NumberViewColumn('SIFRA_KUPCA', 'SIFRA_KUPCA', 'SIFRA KUPCA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for OPIS field
            //
            $column = new TextViewColumn('SIFRA_TIP_DOC', 'LA1', 'SIFRA TIP DOC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_VRST_SKL field
            //
            $column = new NumberViewColumn('SIFRA_SKLADI', 'LA2', 'SIFRA SKLADI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for BROJ_SASIJE field
            //
            $column = new TextViewColumn('BROJ_SASIJE', 'BROJ_SASIJE', 'BROJ SASIJE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for DATUM field
            //
            $column = new DateTimeViewColumn('DATUM', 'DATUM', 'DATUM', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_SERVISA field
            //
            $column = new NumberViewColumn('SIFRA_SERVISA', 'SIFRA_SERVISA', 'SIFRA SERVISA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for IME_RADNIKA field
            //
            $column = new TextViewColumn('SIFRA_RADNIKA', 'LA3', 'SIFRA RADNIKA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_KUPCA field
            //
            $column = new NumberViewColumn('SIFRA_PRODMJ', 'LA4', 'SIFRA PRODMJ', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_VLASNIKA field
            //
            $column = new NumberViewColumn('SIFRA_VEZE_VLASNIK_VOZ', 'LA5', 'SIFRA VEZE VLASNIK VOZ', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for SIFRA_VEZE_OBJUGOVOR field
            //
            $column = new NumberViewColumn('SIFRA_VEZE_OBJUGOVOR', 'SIFRA_VEZE_OBJUGOVOR', 'SIFRA VEZE OBJUGOVOR', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for SIFRA_IZDATNICE field
            //
            $column = new NumberViewColumn('SIFRA_IZDATNICE', 'SIFRA_IZDATNICE', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('BROJ_IZDATNICE', 'BROJ_IZDATNICE', 'BROJ IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_RACUNA field
            //
            $column = new NumberViewColumn('SIFRA_RACUNA', 'SIFRA_RACUNA', 'SIFRA RACUNA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_IFA field
            //
            $column = new NumberViewColumn('SIFRA_IFA', 'SIFRA_IFA', 'SIFRA IFA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_KUPCA field
            //
            $column = new NumberViewColumn('SIFRA_KUPCA', 'SIFRA_KUPCA', 'SIFRA KUPCA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for OPIS field
            //
            $column = new TextViewColumn('SIFRA_TIP_DOC', 'LA1', 'SIFRA TIP DOC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_VRST_SKL field
            //
            $column = new NumberViewColumn('SIFRA_SKLADI', 'LA2', 'SIFRA SKLADI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for BROJ_SASIJE field
            //
            $column = new TextViewColumn('BROJ_SASIJE', 'BROJ_SASIJE', 'BROJ SASIJE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for DATUM field
            //
            $column = new DateTimeViewColumn('DATUM', 'DATUM', 'DATUM', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_SERVISA field
            //
            $column = new NumberViewColumn('SIFRA_SERVISA', 'SIFRA_SERVISA', 'SIFRA SERVISA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for IME_RADNIKA field
            //
            $column = new TextViewColumn('SIFRA_RADNIKA', 'LA3', 'SIFRA RADNIKA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_KUPCA field
            //
            $column = new NumberViewColumn('SIFRA_PRODMJ', 'LA4', 'SIFRA PRODMJ', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_VLASNIKA field
            //
            $column = new NumberViewColumn('SIFRA_VEZE_VLASNIK_VOZ', 'LA5', 'SIFRA VEZE VLASNIK VOZ', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for SIFRA_VEZE_OBJUGOVOR field
            //
            $column = new NumberViewColumn('SIFRA_VEZE_OBJUGOVOR', 'SIFRA_VEZE_OBJUGOVOR', 'SIFRA VEZE OBJUGOVOR', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for SIFRA_IZDATNICE field
            //
            $column = new NumberViewColumn('SIFRA_IZDATNICE', 'SIFRA_IZDATNICE', 'SIFRA IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for BROJ_IZDATNICE field
            //
            $column = new TextViewColumn('BROJ_IZDATNICE', 'BROJ_IZDATNICE', 'BROJ IZDATNICE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_RACUNA field
            //
            $column = new NumberViewColumn('SIFRA_RACUNA', 'SIFRA_RACUNA', 'SIFRA RACUNA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_IFA field
            //
            $column = new NumberViewColumn('SIFRA_IFA', 'SIFRA_IFA', 'SIFRA IFA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_KUPCA field
            //
            $column = new NumberViewColumn('SIFRA_KUPCA', 'SIFRA_KUPCA', 'SIFRA KUPCA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for OPIS field
            //
            $column = new TextViewColumn('SIFRA_TIP_DOC', 'LA1', 'SIFRA TIP DOC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_VRST_SKL field
            //
            $column = new NumberViewColumn('SIFRA_SKLADI', 'LA2', 'SIFRA SKLADI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for BROJ_SASIJE field
            //
            $column = new TextViewColumn('BROJ_SASIJE', 'BROJ_SASIJE', 'BROJ SASIJE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for DATUM field
            //
            $column = new DateTimeViewColumn('DATUM', 'DATUM', 'DATUM', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_SERVISA field
            //
            $column = new NumberViewColumn('SIFRA_SERVISA', 'SIFRA_SERVISA', 'SIFRA SERVISA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for IME_RADNIKA field
            //
            $column = new TextViewColumn('SIFRA_RADNIKA', 'LA3', 'SIFRA RADNIKA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_PRIMKE field
            //
            $column = new NumberViewColumn('SIFRA_PRIMKE', 'SIFRA_PRIMKE', 'SIFRA PRIMKE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for NAPOMENA field
            //
            $column = new TextViewColumn('NAPOMENA', 'NAPOMENA', 'NAPOMENA', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_KUPCA field
            //
            $column = new NumberViewColumn('SIFRA_PRODMJ', 'LA4', 'SIFRA PRODMJ', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_VLASNIKA field
            //
            $column = new NumberViewColumn('SIFRA_VEZE_VLASNIK_VOZ', 'LA5', 'SIFRA VEZE VLASNIK VOZ', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for SIFRA_VEZE_OBJUGOVOR field
            //
            $column = new NumberViewColumn('SIFRA_VEZE_OBJUGOVOR', 'SIFRA_VEZE_OBJUGOVOR', 'SIFRA VEZE OBJUGOVOR', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function CreateMasterDetailRecordGrid()
        {
            $result = new Grid($this, $this->dataset);
            
            $this->AddFieldColumns($result, false);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            
            $result->SetAllowDeleteSelected(false);
            $result->SetShowUpdateLink(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(false);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $this->setupGridColumnGroup($result);
            $this->attachGridEventHandlers($result);
            
            return $result;
        }
        
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddToggleEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setAllowedActions(array('view', 'insert', 'copy', 'edit', 'multi-edit', 'delete', 'multi-delete'));
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(true);
            $this->setExportListAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $detailPage = new MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFEPage('MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE', $this, array('SIFRA_IZDATNICE'), array('SIFRA_IZDATNICE'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IFE'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IFE'));
            $detailPage->SetHttpHandlerName('MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_handler');
            $handler = new PageHTTPHandler('MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IFE_handler', $detailPage);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $detailPage = new MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICEPage('MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE', $this, array('SIFRA_IZDATNICE'), array('SIFRA_IZDATNICE'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IZDATNICE'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IZDATNICE'));
            $detailPage->SetHttpHandlerName('MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_handler');
            $handler = new PageHTTPHandler('MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_handler', $detailPage);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $detailPage = new MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOGPage('MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG', $this, array('SIFRA_IZDATNICE'), array('SIFRA_IZDATNICE'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IZDATNICE_LOG'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('MERCEDES.T_IZDATNICA.MERCEDES.T_STAVKA_IZDATNICE_LOG'));
            $detailPage->SetHttpHandlerName('MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_handler');
            $handler = new PageHTTPHandler('MERCEDES_T_IZDATNICA_MERCEDES_T_STAVKA_IZDATNICE_LOG_handler', $detailPage);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $detailPage = new MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKOPage('MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO', $this, array('SIFRA_IZDATNICE'), array('SIFRA_IZDATNICE'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('MERCEDES.T_IZDATNICA.MERCEDES.T_VEZA_IZD_VEZA_PKO'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('MERCEDES.T_IZDATNICA.MERCEDES.T_VEZA_IZD_VEZA_PKO'));
            $detailPage->SetHttpHandlerName('MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_handler');
            $handler = new PageHTTPHandler('MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_IZD_VEZA_PKO_handler', $detailPage);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $detailPage = new MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZDPage('MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD', $this, array('SIFRA_IZDATNICE'), array('SIFRA_IZDATNICE'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('MERCEDES.T_IZDATNICA.MERCEDES.T_VEZA_PRIJAVA_IZD'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('MERCEDES.T_IZDATNICA.MERCEDES.T_VEZA_PRIJAVA_IZD'));
            $detailPage->SetHttpHandlerName('MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_handler');
            $handler = new PageHTTPHandler('MERCEDES_T_IZDATNICA_MERCEDES_T_VEZA_PRIJAVA_IZD_handler', $detailPage);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_TIP_DOC"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_TIP_DOC', true, true),
                    new StringField('OPIS', true)
                )
            );
            $lookupDataset->setOrderByField('OPIS', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_SIFRA_TIP_DOC_search', 'SIFRA_TIP_DOC', 'OPIS', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_SKLADISTE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_SKLADI', true, true),
                    new IntegerField('SIFRA_VRST_SKL', true),
                    new StringField('NAZIV'),
                    new StringField('BROJ_SKL', true),
                    new IntegerField('SIFRA_POSLOVNICE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new StringField('TELEFON2'),
                    new StringField('MOBITEL'),
                    new StringField('MOBITEL2'),
                    new StringField('MOBITEL3'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('EMAIL'),
                    new StringField('EMAIL2'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('BROJ_POSTE'),
                    new StringField('BROJ_KUCE')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VRST_SKL', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_SIFRA_SKLADI_search', 'SIFRA_SKLADI', 'SIFRA_VRST_SKL', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_RADNIK"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_RADNIKA', true, true),
                    new StringField('IME_RADNIKA', true),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new IntegerField('SIFRA_RAD_MJ'),
                    new StringField('ZAPORKA'),
                    new StringField('TELEFON_1'),
                    new StringField('FAX'),
                    new StringField('EMAIL'),
                    new StringField('ZVANJE'),
                    new IntegerField('SIFRA_STR_SPREME'),
                    new StringField('NAPOMENA'),
                    new StringField('JMBG'),
                    new StringField('VRSTA')
                )
            );
            $lookupDataset->setOrderByField('IME_RADNIKA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_SIFRA_RADNIKA_search', 'SIFRA_RADNIKA', 'IME_RADNIKA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRODAJNO_MJESTO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRODMJ', true, true),
                    new IntegerField('SIFRA_KUPCA'),
                    new StringField('NAZIV_PRODMJ'),
                    new StringField('ZAPRIMANJE_TJEDNO'),
                    new StringField('PRODMJ_SEZONSKO'),
                    new StringField('ZNACAJ'),
                    new StringField('BROJ_PRODMJ'),
                    new StringField('TIP_IZVJESTAJA'),
                    new StringField('BROJ_POSTE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('BROJ_KUCE'),
                    new StringField('TELEFON'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('NAPOMENA'),
                    new StringField('ZIRO_RACUN'),
                    new StringField('EMAIL'),
                    new StringField('IBAN')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KUPCA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_SIFRA_PRODMJ_search', 'SIFRA_PRODMJ', 'SIFRA_KUPCA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_VLASNIK_VOZILO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ', true, true),
                    new IntegerField('SIFRA_VLASNIKA', true),
                    new StringField('BROJ_SASIJE', true),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('KORISNIK'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VLASNIKA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_MERCEDES_T_IZDATNICA_SIFRA_VEZE_VLASNIK_VOZ_search', 'SIFRA_VEZE_VLASNIK_VOZ', 'SIFRA_VLASNIKA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_TIP_DOC"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_TIP_DOC', true, true),
                    new StringField('OPIS', true)
                )
            );
            $lookupDataset->setOrderByField('OPIS', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_SIFRA_TIP_DOC_search', 'SIFRA_TIP_DOC', 'OPIS', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_SKLADISTE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_SKLADI', true, true),
                    new IntegerField('SIFRA_VRST_SKL', true),
                    new StringField('NAZIV'),
                    new StringField('BROJ_SKL', true),
                    new IntegerField('SIFRA_POSLOVNICE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new StringField('TELEFON2'),
                    new StringField('MOBITEL'),
                    new StringField('MOBITEL2'),
                    new StringField('MOBITEL3'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('EMAIL'),
                    new StringField('EMAIL2'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('BROJ_POSTE'),
                    new StringField('BROJ_KUCE')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VRST_SKL', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_SIFRA_SKLADI_search', 'SIFRA_SKLADI', 'SIFRA_VRST_SKL', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_RADNIK"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_RADNIKA', true, true),
                    new StringField('IME_RADNIKA', true),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new IntegerField('SIFRA_RAD_MJ'),
                    new StringField('ZAPORKA'),
                    new StringField('TELEFON_1'),
                    new StringField('FAX'),
                    new StringField('EMAIL'),
                    new StringField('ZVANJE'),
                    new IntegerField('SIFRA_STR_SPREME'),
                    new StringField('NAPOMENA'),
                    new StringField('JMBG'),
                    new StringField('VRSTA')
                )
            );
            $lookupDataset->setOrderByField('IME_RADNIKA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_SIFRA_RADNIKA_search', 'SIFRA_RADNIKA', 'IME_RADNIKA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRODAJNO_MJESTO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRODMJ', true, true),
                    new IntegerField('SIFRA_KUPCA'),
                    new StringField('NAZIV_PRODMJ'),
                    new StringField('ZAPRIMANJE_TJEDNO'),
                    new StringField('PRODMJ_SEZONSKO'),
                    new StringField('ZNACAJ'),
                    new StringField('BROJ_PRODMJ'),
                    new StringField('TIP_IZVJESTAJA'),
                    new StringField('BROJ_POSTE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('BROJ_KUCE'),
                    new StringField('TELEFON'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('NAPOMENA'),
                    new StringField('ZIRO_RACUN'),
                    new StringField('EMAIL'),
                    new StringField('IBAN')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KUPCA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_SIFRA_PRODMJ_search', 'SIFRA_PRODMJ', 'SIFRA_KUPCA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_VLASNIK_VOZILO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ', true, true),
                    new IntegerField('SIFRA_VLASNIKA', true),
                    new StringField('BROJ_SASIJE', true),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('KORISNIK'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VLASNIKA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_MERCEDES_T_IZDATNICA_SIFRA_VEZE_VLASNIK_VOZ_search', 'SIFRA_VEZE_VLASNIK_VOZ', 'SIFRA_VLASNIKA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_TIP_DOC"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_TIP_DOC', true, true),
                    new StringField('OPIS', true)
                )
            );
            $lookupDataset->setOrderByField('OPIS', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_SIFRA_TIP_DOC_search', 'SIFRA_TIP_DOC', 'OPIS', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_SKLADISTE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_SKLADI', true, true),
                    new IntegerField('SIFRA_VRST_SKL', true),
                    new StringField('NAZIV'),
                    new StringField('BROJ_SKL', true),
                    new IntegerField('SIFRA_POSLOVNICE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new StringField('TELEFON2'),
                    new StringField('MOBITEL'),
                    new StringField('MOBITEL2'),
                    new StringField('MOBITEL3'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('EMAIL'),
                    new StringField('EMAIL2'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('BROJ_POSTE'),
                    new StringField('BROJ_KUCE')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VRST_SKL', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_SIFRA_SKLADI_search', 'SIFRA_SKLADI', 'SIFRA_VRST_SKL', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_RADNIK"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_RADNIKA', true, true),
                    new StringField('IME_RADNIKA', true),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new IntegerField('SIFRA_RAD_MJ'),
                    new StringField('ZAPORKA'),
                    new StringField('TELEFON_1'),
                    new StringField('FAX'),
                    new StringField('EMAIL'),
                    new StringField('ZVANJE'),
                    new IntegerField('SIFRA_STR_SPREME'),
                    new StringField('NAPOMENA'),
                    new StringField('JMBG'),
                    new StringField('VRSTA')
                )
            );
            $lookupDataset->setOrderByField('IME_RADNIKA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_SIFRA_RADNIKA_search', 'SIFRA_RADNIKA', 'IME_RADNIKA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRODAJNO_MJESTO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRODMJ', true, true),
                    new IntegerField('SIFRA_KUPCA'),
                    new StringField('NAZIV_PRODMJ'),
                    new StringField('ZAPRIMANJE_TJEDNO'),
                    new StringField('PRODMJ_SEZONSKO'),
                    new StringField('ZNACAJ'),
                    new StringField('BROJ_PRODMJ'),
                    new StringField('TIP_IZVJESTAJA'),
                    new StringField('BROJ_POSTE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('BROJ_KUCE'),
                    new StringField('TELEFON'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('NAPOMENA'),
                    new StringField('ZIRO_RACUN'),
                    new StringField('EMAIL'),
                    new StringField('IBAN')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KUPCA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_SIFRA_PRODMJ_search', 'SIFRA_PRODMJ', 'SIFRA_KUPCA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_VLASNIK_VOZILO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ', true, true),
                    new IntegerField('SIFRA_VLASNIKA', true),
                    new StringField('BROJ_SASIJE', true),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('KORISNIK'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VLASNIKA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_MERCEDES_T_IZDATNICA_SIFRA_VEZE_VLASNIK_VOZ_search', 'SIFRA_VEZE_VLASNIK_VOZ', 'SIFRA_VLASNIKA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_TIP_DOC"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_TIP_DOC', true, true),
                    new StringField('OPIS', true)
                )
            );
            $lookupDataset->setOrderByField('OPIS', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_SIFRA_TIP_DOC_search', 'SIFRA_TIP_DOC', 'OPIS', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_SKLADISTE"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_SKLADI', true, true),
                    new IntegerField('SIFRA_VRST_SKL', true),
                    new StringField('NAZIV'),
                    new StringField('BROJ_SKL', true),
                    new IntegerField('SIFRA_POSLOVNICE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new StringField('TELEFON2'),
                    new StringField('MOBITEL'),
                    new StringField('MOBITEL2'),
                    new StringField('MOBITEL3'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('EMAIL'),
                    new StringField('EMAIL2'),
                    new StringField('NAPOMENA'),
                    new StringField('NAPOMENA2'),
                    new StringField('BROJ_POSTE'),
                    new StringField('BROJ_KUCE')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VRST_SKL', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_SIFRA_SKLADI_search', 'SIFRA_SKLADI', 'SIFRA_VRST_SKL', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_RADNIK"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_RADNIKA', true, true),
                    new StringField('IME_RADNIKA', true),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('TELEFON'),
                    new IntegerField('SIFRA_RAD_MJ'),
                    new StringField('ZAPORKA'),
                    new StringField('TELEFON_1'),
                    new StringField('FAX'),
                    new StringField('EMAIL'),
                    new StringField('ZVANJE'),
                    new IntegerField('SIFRA_STR_SPREME'),
                    new StringField('NAPOMENA'),
                    new StringField('JMBG'),
                    new StringField('VRSTA')
                )
            );
            $lookupDataset->setOrderByField('IME_RADNIKA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_SIFRA_RADNIKA_search', 'SIFRA_RADNIKA', 'IME_RADNIKA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_PRODAJNO_MJESTO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_PRODMJ', true, true),
                    new IntegerField('SIFRA_KUPCA'),
                    new StringField('NAZIV_PRODMJ'),
                    new StringField('ZAPRIMANJE_TJEDNO'),
                    new StringField('PRODMJ_SEZONSKO'),
                    new StringField('ZNACAJ'),
                    new StringField('BROJ_PRODMJ'),
                    new StringField('TIP_IZVJESTAJA'),
                    new StringField('BROJ_POSTE'),
                    new StringField('MJESTO'),
                    new StringField('ADRESA'),
                    new StringField('BROJ_KUCE'),
                    new StringField('TELEFON'),
                    new StringField('FAX'),
                    new StringField('OSOBA'),
                    new StringField('OSOBA_IME'),
                    new StringField('NAPOMENA'),
                    new StringField('ZIRO_RACUN'),
                    new StringField('EMAIL'),
                    new StringField('IBAN')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_KUPCA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_SIFRA_PRODMJ_search', 'SIFRA_PRODMJ', 'SIFRA_KUPCA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                OracleConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '"MERCEDES"."T_VEZA_VLASNIK_VOZILO"');
            $lookupDataset->addFields(
                array(
                    new IntegerField('SIFRA_VEZE_VLASNIK_VOZ', true, true),
                    new IntegerField('SIFRA_VLASNIKA', true),
                    new StringField('BROJ_SASIJE', true),
                    new DateTimeField('DATUM_OD'),
                    new DateTimeField('DATUM_DO'),
                    new DateTimeField('DATUM_UNOSA'),
                    new StringField('KORISNIK'),
                    new StringField('NAPOMENA')
                )
            );
            $lookupDataset->setOrderByField('SIFRA_VLASNIKA', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_MERCEDES_T_IZDATNICA_SIFRA_VEZE_VLASNIK_VOZ_search', 'SIFRA_VEZE_VLASNIK_VOZ', 'SIFRA_VLASNIKA', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }

    SetUpUserAuthorization();

    try
    {
        $Page = new MERCEDES_T_IZDATNICAPage("MERCEDES_T_IZDATNICA", "T_IZDATNICA.php", GetCurrentUserPermissionsForPage("MERCEDES.T_IZDATNICA"), 'UTF-8');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("MERCEDES.T_IZDATNICA"));
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
