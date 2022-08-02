<?php

namespace TestTask\Support;

class ProductsModelsDirector
{
    private $currentModel;

    private $modelsClasses = array(
        'Book' => 'App\Models\Book',
        'Furniture' => 'App\Models\Furniture',
        'DVD' => 'App\Models\DVD'
    );

    private function currentModelClass($productType)
    {
        $currentModelClass = $this->modelsClasses[$productType];

        return $currentModelClass;
    }

    public function instantiateModel($productType)
    {
        // prouduct class is the model
        $currentModelClass =  $this->currentModelClass($productType);
        $this->currentModel = new $currentModelClass;

        return $this->currentModel;
    }
}
