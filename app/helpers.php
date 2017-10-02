<?php
if (!function_exists('getPageElementContentData')) {
		function getElementContentData($element, $nodeId)
		{
				$content = $element->contents->where('node_id', $nodeId)->first();
				if (!empty($content)) {
						return $content->data;
				}
				return null;
		}
}
