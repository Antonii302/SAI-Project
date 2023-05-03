<?php 

namespace app\components;

use \yii\helpers\Html;

class GridView extends \kartik\grid\GridView{
    public $panel = [
        'heading' => '',
        'before' => '<div>{addRecord} {reloadPage}</div>',
        'after' => false,
    ];

    public $toolbar = false;

    public $summary = '<small>Mostrando <b>{begin}</b> - <b>{end}</b> de <b>{totalCount} registros</b></small>';
    
    public $containerOptions = [
        'class' => 'p-2'
    ];

    public $headerRowOptions = [
        'class' => 'small bg-light'
    ];
    public $filterRowOptions = [
        'class' => 'bg-light'
    ];

    public $panelFooterTemplate = '<div class="kv-panel-pager"><div class="d-flex justify-content-center">{pager}</div></div>';

    public $hover = false;
    public $striped = false;

    public $pjax = true;
    public $pjaxSettings = [
        'neverTimeout' => true
    ];

    public function init()
    {
        $this->initGridView();
        parent::init();

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
}

?>