<?php


namespace App\Services\Implement;


use Illuminate\Pagination\LengthAwarePaginator;

class Paginator extends LengthAwarePaginator {
    public function __construct($items, $total, $perPage, $currentPage = null, array $options = []) {
        parent::__construct($items, $total, $perPage, $currentPage, [
            'pageName' => '',
            'path' => ''
        ]);
    }

    public function getElements() {
        $elements = $this->elements();
        foreach($elements as & $element) {
            if(is_array($element)) {
                $element = array_keys($element);
            }
        }
        return $elements;
    }

}
