<h3>
    <br>Üdvözöljük a Labdarugás - NB1 oldalán!<br>
</h3>
<br><br>

<h4> Deviza lekérdezés az MNB-ről </h4>

<?php
$client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?wsdl");
$valutak = simplexml_load_string($client->GetCurrencies()->GetCurrenciesResult);
?>
<form name="valuta" method="post">
    <br>
    <h6>Valuta:</h6>
    <br>
    <select class="form-control" name="valuta1">
            <option value="">Válasza ki az induló valutát...</option></select>
    <?php foreach($valutak->curr as $curr)
    {
        echo '<option value="'.$curr[1].'">'.$curr[1].'</option>';
    }
    ?>
    <br>
    <select class="form-control" name="valuta2">
            <option value="">Válasza ki a ellen valutát...</option></select>
    <br>
    <h6>Intervallum:</h6>
    <br>
    <input class="form-control" type="date" placeholder="Kezdő dátum" min="1949-01-03" max="<?php date('Y-m-d'); ?>">
    <br>
    <input class="form-control" type="date" placeholder="Befejező dátum" min="1949-01-03" max="<?php echo date('Y-m-d'); ?>">
    <br>
    <input class="btn btn-success" type="submit" value="Lekérdezés">
</form>