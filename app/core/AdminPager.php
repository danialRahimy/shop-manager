<?php

class AdminPager
{
    private $hasPager;
    private $count;
    private $perPage;
    private $currentPage;
    private $pager;

    public function __construct(array $pagerDetail = array())
    {
        if (count($pagerDetail)){
            $this->hasPager = true;
            $this->count = (int) $pagerDetail["count"];
            $this->perPage = (int) (array_key_exists("perPage", $pagerDetail)) ? $pagerDetail["perPage"] : 10;
            $this->currentPage = (int) (array_key_exists("currentPage", $pagerDetail)) ? $pagerDetail["currentPage"] : 1;
        }
    }

    private function createPager()
    {
        if (!is_null($this->pager))
            return $this->pager;

        $nextNumber = $this->currentPage + 1;
        $previousNumber = $this->currentPage - 1;
        $allPage = ceil($this->count / $this->perPage);

        $next = "?pageId=$nextNumber";
        $previous = "?pageId=$previousNumber";

        $nextDisable = "";
        $previousDisable = "";

        $uri = $_SERVER["REQUEST_URI"];
        $pos = strpos($uri, "?");
        if ($pos){
            $parameter = substr($uri, $pos);

            $parameter = preg_replace("/(&|)pageId=[0-9]*/", "", $parameter);

            $next = "$parameter" . "&pageId=$nextNumber";
            $previous = "$parameter" . "&pageId=$previousNumber";
        }

        if ($nextNumber > $allPage){
            $next = "";
            $nextDisable = "disabled";
        }

        if ($previousNumber <= 0){
            $previous = "";
            $previousDisable = "disabled";
        }

        $this->pager = <<<HTML
            <nav dir="ltr">
                <ul class="pagination justify-content-center">
                    <li class="page-item $previousDisable">
                        <a class="page-link" href="$previous">
                            <span>&laquo;</span>
                        </a>
                    </li>
                    <li class='page-item active'>
                        <a class='page-link' href='#'>$this->currentPage</a>
                    </li>
                    <li class="page-item $nextDisable">
                        <a class="page-link" href="$next">
                            <span>&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
HTML;

        $this->pager .= "</ul></nav>";
    }

    public function getPager()
    {
        $this->createPager();

        return $this->pager;
    }
}