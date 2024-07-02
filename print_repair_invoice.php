<?php
require("fpdf/fpdf.php");
require("word.php");
require "config.php";

//customer and invoice details
$info = [
    "customer" => "",
    "repair_code" => ",",
    "repair_date" => "",
    "repair_invoice_no" => "",
    "invoice_date" => "",
    "advance_amt" => "",
    "sub_total" => "",
    "serv_charge" => "",
    "total_cost" => "",
    "amt_paid" => "",
    "balance_amt" => "",
    "words" => "",
];

//Select Invoice Details From Database
$sql = "select * from repair_invoice where repair_invoice_id='{$_GET["id"]}'";
$res = $con->query($sql);
if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();

    $obj = new SriLankanCurrency($row["total_cost"]);


    $info = [
        "customer" => $row["customer_name"],
        "repair_code" => $row["repair_code"],
        "repair_date" => $row["repair_date"],
        "repair_invoice_no" => $row["repair_invoice_id"],
        "invoice_date" => date("d-m-Y", strtotime($row["invoice_date"])),
        "advance_amt" => $row["advance_amt"],
        "sub_total" => $row["sub_total"],
        "serv_charge" => $row["serv_charge"],
        "total_cost" => $row["total_cost"],
        "amt_paid" => $row["amt_paid"],
        "balance_amt" => $row["due_balance"],
        "words" => $obj->get_words(),
    ];
}

//invoice Products
$products_info = [];

//Select Invoice Product Details From Database
$sql = "SELECT ip.*, p.product_name AS product_name FROM invoice_products AS ip
        INNER JOIN products AS p ON ip.PNAME = p.id
        WHERE ip.repair_invoice_id  = '{$_GET["id"]}'";
$res = $con->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $products_info[] = [
            "name" => $row["product_name"],
            // Use the product name instead of the ID
            "price" => $row["PRICE"],
            "qty" => $row["QTY"],
            "total" => $row["TOTAL"],
        ];
    }
}

class PDF extends FPDF
{
    function Header()
    {

        //Display Company Info
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(50, 10, "Hari Kirshna Mobile Care", 0, 1);
        $this->SetFont('Arial', '', 14);
        $this->Cell(50, 7, "No.17,", 0, 1);
        $this->Cell(50, 7, "Main Street Watagoda.", 0, 1);
        $this->Cell(50, 7, "PH : 0778982452", 0, 1);

        //Display INVOICE text
        $this->SetY(15);
        $this->SetX(-40);
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(50, 10, "INVOICE", 0, 1);

        //Display Horizontal line
        $this->Line(0, 48, 210, 48);
    }

    function Body($info, $products_info)
    {

        //Billing Details
        $this->SetY(55);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 10, "Bill To: ", 0, 1);
        $this->SetFont('Arial', '', 12);
        $this->Cell(50, 7, $info["customer"], 0, 1);
        $this->Cell(50, 7, $info["repair_code"], 0, 1);
        $this->Cell(50, 7, $info["repair_date"], 0, 1);

        //Display Invoice no
        $this->SetY(55);
        $this->SetX(-60);
        $this->Cell(50, 7, "Invoice No : " . $info["repair_invoice_no"]);

        //Display Invoice date
        $this->SetY(63);
        $this->SetX(-60);
        $this->Cell(50, 7, "Invoice Date : " . $info["invoice_date"]);

        //Display Table headings
        $this->SetY(95);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(80, 9, "DESCRIPTION", 1, 0);
        $this->Cell(40, 9, "PRICE", 1, 0, "C");
        $this->Cell(30, 9, "QTY", 1, 0, "C");
        $this->Cell(40, 9, "TOTAL", 1, 1, "C");
        $this->SetFont('Arial', '', 12);

        //Display table product rows
        foreach ($products_info as $row) {
            $this->Cell(80, 9, $row["name"], "LR", 0);
            $this->Cell(40, 9, $row["price"], "R", 0, "R");
            $this->Cell(30, 9, $row["qty"], "R", 0, "C");
            $this->Cell(40, 9, $row["total"], "R", 1, "R");
        }
        //Display table empty rows
        for ($i = 0; $i < 12 - count($products_info); $i++) {
            $this->Cell(80, 9, "", "LR", 0);
            $this->Cell(40, 9, "", "R", 0, "R");
            $this->Cell(30, 9, "", "R", 0, "C");
            $this->Cell(40, 9, "", "R", 1, "R");
        }
        //Display table total row
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(150, 9, "Advance Paid", 1, 0, "R");
        $this->Cell(40, 9, $info["advance_amt"], 1, 1, "R");
        $this->Cell(150, 9, "SUB TOTAL", 1, 0, "R");
        $this->Cell(40, 9, $info["sub_total"], 1, 1, "R");
        $this->Cell(150, 9, "Service Charge", 1, 0, "R");
        $this->Cell(40, 9, $info["serv_charge"], 1, 1, "R");
        $this->Cell(150, 9, "Total Amount", 1, 0, "R");
        $this->Cell(40, 9, $info["total_cost"], 1, 1, "R");
        $this->Cell(150, 9, "Amount Paid", 1, 0, "R");
        $this->Cell(40, 9, $info["amt_paid"], 1, 1, "R");
        $this->Cell(150, 9, "Balance", 1, 0, "R");
        $this->Cell(40, 9, $info["balance_amt"], 1, 1, "R");

        //Display amount in words
        //   $this->SetY(225);
        //   $this->SetX(10);
        //   $this->SetFont('Arial','B',12);
        //   $this->Cell(0,9,"Amount in Words ",0,1);
        //   $this->SetFont('Arial','',12);
        //   $this->Cell(0,9,$info["words"],0,1);

    }
    function Footer()
    {

        //set footer position
        $this->SetY(-50);
        $this->SetFont('Arial', 'B', 12);
        // $this->Cell(0, 10, "for Hari Kirshna Mobile Care", 0, 1, "R");
        $this->Ln(15);
        $this->SetFont('Arial', '', 12);
        // $this->Cell(0, 10, "Authorized Signature", 0, 1, "R");
        $this->SetFont('Arial', '', 10);

        //Display Footer Text
        $this->SetY(-15);

        // Set font and font size
        $this->SetFont('Arial', '', 10);

        // Display centered text
        $this->Cell(0, 10, "Thank you Come Again", 0, 1, "C");

    }

}
//Create A4 Page with Portrait 
$pdf = new PDF("P", "mm", "A4");
$pdf->AddPage();
$pdf->body($info, $products_info);
$pdf->Output();
?>