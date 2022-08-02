<?php
namespace TestTask\Support;

trait RenderAttr
{
    private function renderSpecialAttrOfDVD($product)
    {
        $handledSizeAttr = round($product['size'], 2);
        $toBerRenderedSpecialAttr =  'Size: ' . $handledSizeAttr . ' MB';

        return $toBerRenderedSpecialAttr;
    }

    private function renderSpecialAttrOfBook($product)
    {
        $handledWeightAttr = round($product['weight'], 2);
        $toBerRenderedSpecialAttr =  'Weight: ' . $handledWeightAttr . ' KG';

        return $toBerRenderedSpecialAttr;
    }


    private function renderSpecialAttrOfFurniture($product)
    {
        $handledWidthAttr  = round($product['width'], 2);
        $handledLengthAttr = round($product['length'], 2);
        $handledHeightAttr = round($product['height'], 2);
        // showing furniture dimensions in form width x length x height
        $toBerRenderedSpecialAttr =  'Dimensions: '. $handledWidthAttr .'x'. $handledLengthAttr . 'x' . $handledHeightAttr;

        return $toBerRenderedSpecialAttr;
    }

    private function renderSpecialAttr($product)
    {
        $renderingMethodName = $this->renderingMethodName($product);
        $toBerRenderedSpecialAttr = $this -> $renderingMethodName($product);

        return $toBerRenderedSpecialAttr;
    }


    private function renderingMethodName($product)
    {
        $renderingMethodFirstHalfName = 'renderSpecialAttrOf';
        $renderingMethodLastHalfName = $product['type'];
        $renderingMethodName = $renderingMethodFirstHalfName . $renderingMethodLastHalfName;

        return $renderingMethodName;
    }

    private function idsWithToBeRenderedSpecialAttrs($products)
    {
        $idsWithToBeRenderedSpecialAttrs = [];

        foreach ($products as $product) {
            $id = $product['product_id'];
            $toBeRenderedSpecialAttr = $this->renderSpecialAttr($product);

            $idsWithToBeRenderedSpecialAttrs[$id] = $toBeRenderedSpecialAttr;
        }

        return $idsWithToBeRenderedSpecialAttrs;
    }
}
