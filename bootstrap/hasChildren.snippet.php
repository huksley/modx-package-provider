<?php
/* Taken from
http://forums.modx.com/thread/29913/how-to-find-if-resource-has-children#dis-post-162202
*/

$docId = isset($id) ? intval($id) : $modx->resource->get('id');
$document = $modx->getObject('modResource', $docId);
if ($document) {
    $hasChildren = $document->hasChildren();
    return $hasChildren ? 1 : 0;
}
?>