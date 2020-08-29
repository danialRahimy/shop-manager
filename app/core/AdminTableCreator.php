<?php


class AdminTableCreator
{
    private $columnNames;
    private $data;

    private $tableHead;
    private $tableBody;
    private $table;

    public function __construct(array $columnNames, array $data)
    {
        $this->columnNames = $columnNames;
        $this->data = $data;
    }

    public function getTable()
    {
        $this->createTableHead();
        $this->createTableBody();

        $this->table = <<<HTML
            <table class="table table-hover">
                $this->tableHead
                $this->tableBody
            </table>
HTML;
        return $this->table;
    }

    private function createTableHead()
    {
        $this->tableHead = "<thead><tr>";

        foreach ($this->columnNames as $en => $fa){

            $this->tableHead .= "<th scope='col'>$fa</th>";
        }

        $this->tableHead .= "</tr></thead>";
    }

    private function createTableBody()
    {
        $this->tableBody = "<tbody>";

            foreach ($this->data as $dataDetail){

                $this->tableBody .= "<tr>";

                foreach ($this->columnNames as $en => $fa){

                    if (array_key_exists($en, $dataDetail)){

                        $this->tableBody .= "<td>$dataDetail[$en]</td>";
                    }else{

                        throw new ExceptionDev("
                        $en 
                        در آرایه 
                        dataDetail
                        وجود ندارد
                        ");
                    }
            }
                $this->tableBody .= "</tr>";
        }

        $this->tableBody .= "</tbody>";
    }
}