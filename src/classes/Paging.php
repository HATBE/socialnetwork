<?php
    namespace app;

    class Paging {
        private $_page;
        private $_itemsCount;
        private $_itemsPerPage;
        private $_maxPages;

        public function __construct($itemsCount, $page, $itemsPerPage) {
            $this->_itemsCount = intval($itemsCount);
            $this->_page = intval($page);
            $this->_itemsPerPage = intval($itemsPerPage);
            $this->_maxPages = ceil($this->_itemsCount / $this->_itemsPerPage);
        }

        public function pageExists() {
            if($this->_page > $this->_maxPages || $this->_page <= 0) {
                return false;
            }
            return true;
        }
 
        // This function gets the offset for the SQL statement
        public function getOffset() {
            return ($this->_page === 1 ? 0 : $this->_itemsPerPage * ($this->_page -1));
        }
    }