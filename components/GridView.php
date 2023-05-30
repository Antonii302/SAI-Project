<?php 

namespace app\components;

use \yii\helpers\Html;

class GridView extends \kartik\grid\GridView{
    public $pjax = false;
    public $pjaxSettings = ['neverTimeout' => true];

    public $panel = [
        'heading' => '',
        'before' => '<div>{addRecord} {reloadPage}</div>',
        'after' => false,
        'footer' => ''
    ];    
    
    public $panelFooterTemplate = '<div class="kv-panel-pager"><div class="d-flex justify-content-center">{pager}</div></div>';

    public $summary = '<small>Mostrando <b>{begin}</b> - <b>{end}</b> de <b>{totalCount} registros</b></small>';

    public $toolbar = false;
    
    public $containerOptions = ['class' => 'p-3'];

    public $headerRowOptions = ['class' => 'small bg-light'];
    public $filterRowOptions = ['class' => 'bg-light'];

    public $striped = false;
    public $hover = false;

    public function init()
    {
        $this->initGridView();
        parent::init();

        $this->overridePanelBefore();
        $this->hidePanelSections();        
    }

    private function overridePanelBefore() {
        $this->panel['before'] = strtr($this->panel['before'], [
            '{addRecord}' => Html::a('<i class="fas fa-plus-circle"></i> Añadir registro', ['create'], [
                'class' => 'btn btn-sm btn-success'
            ]),
            '{reloadPage}' => Html::a('<i class="fas fa-redo-alt"></i>', [''], [
                'title' => 'Refrescar la página', 
                'class' => 'btn btn-sm btn-default'
            ])
        ]);
    }

    private function hidePanelSections() {
        $recordsCount = $this->dataProvider->getCount();
        
        if ($recordsCount === 0) { $this->panel['heading'] = false; }
        if ($recordsCount <= 5) { $this->panel['footer'] = false; }
    }
}
