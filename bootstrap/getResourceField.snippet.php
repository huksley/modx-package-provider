<?php
/**
 *
 * getResourceField
 *
 * A snippet to grab a value from a field or a TV
 *
 * @ author Paul Merchant
 * @ author Shaun McCormick
 * @ version 1.0.0 - April 30, 2010
 *
 * OPTIONS
 * id - The resource ID
 * field - (Opt) The field or template variable name, defaults to pagetitle
 * isTV - (Opt) Set as true to return a raw template variable
 * processTV - (Opt) Set as true to return a rendered template variable
 * default - (Opt) The value returned if no field is found
 *
 * Exmaple1: [[getResourceField? &id=`123`]]
 * Example2: [[getResourceField? &id=`[[UltimateParent?]]` &field=`myTV` &isTV=`1`]]
 * Example3: [[getResourceField? &id=`[[*parent]]` &field=`myTV` &processTV=`1`]]
 *
**/
 
// set defaults
$id = $modx->getOption('id',$scriptProperties,$modx->resource->get('id'));
$field = $modx->getOption('field',$scriptProperties,'pagetitle');
$isTV = $modx->getOption('isTV',$scriptProperties,false);
$processTV = $modx->getOption('processTV',$scriptProperties,false);
$output = $modx->getOption('default',$scriptProperties,'');
 
if ($isTV || $processTV) {
    // get the tv object
    $tv = $modx->getObject('modTemplateVar',array('name'=>$field));
    if (empty($tv)) return $output;
    if ($processTV) {
        // get rendered tv value
        $tvValue = $tv->renderOutput($id);
    } else {
        // get raw tv value
        $tvValue = $tv->getValue($id);
    }
    if ($tvValue !== null) {
        $output = $tvValue;
    }
} else {
    if ($id == $modx->resource->get('id')) {
        // use the current resource
        $resource =& $modx->resource;
    } else {
        // grab only the columns we need
        $criteria = $modx->newQuery('modResource');
        $criteria->select($modx->getSelectColumns('modResource','modResource','',array('id',$field)));
        $criteria->where(array('id'=>$id));
        $resource = $modx->getObject('modResource',$criteria);
        if (empty($resource)) return $output;
    }
    $fieldValue = $resource->get($field);
    if ($fieldValue !== null) {
        $output = $fieldValue;
    }
}
 
return $output;
?>