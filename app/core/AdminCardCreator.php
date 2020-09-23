<?php


class AdminCardCreator
{
    private $selectedData;
    private $data;

    private $cardHead;
    private $cardImage;
    private $cardBody;
    private $cardActions;
    private $card;

    public function __construct(array $selectedData, array $data)
    {
        $this->selectedData = $selectedData;
        $this->data = $data;
    }

    public function getCard()
    {
        $this->createCardHead();
        $this->createCardImage();
        $this->createCardBody();
        $this->createCardActions();

        $this->card = <<<HTML
            <div class="col-3">
                <div class="card">
                    $this->tableHead
                    $this->tableImage
                    $this->tableBody
                    $this->tableActions
                </div>
            </div>
HTML;
        return $this->card;
    }

    private function createCardHead()
    {
//        src='/files" . $brands[$key]["logo_src"] . "'
        $this->cardHead = "<div class='card-body d-flex flex-row'>";

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

                foreach ($this->selectedData as $en => $fa){

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