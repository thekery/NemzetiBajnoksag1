<br>
<h1>Csapatok</h1>
<br>
<h4>Klub választó</h4>
<?php

    $client = new SoapClient('http://localhost/feladat/models/csapatok.wsdl');

    $klubbok = $client->getklubbok();

    if(isset($_POST['klub']) && trim($_POST['klub'] != ""))
        $jatekosok = $client->getjatekosok($_POST['klub']);


//---- Select elem a SOAP szolgáltatás segítségével kerül feltöltésre a getKlubbok meghívásával ----
//---- Select elem javascript-el trigger-eli a POST metódust és küldi el a SOAP service-nek az adatot ----
    ?>
<form name="klubselect" method="POST">
    <select class="form-control" name="klub" onchange="javascript:klubselect.submit();">
            <option value="">Válasszon ki egy klubbot...</option>
<?php
    foreach($klubbok->klubbok as $klub)
              {
                  echo '<option value="'.$klub['id'].'">'.$klub['klubnev'].'</option>';
              }
?>
            </select></form>
            <br>
<?php

    //---- Táblás megjelenítés --
if(isset($jatekosok->jatekosok)) {
    echo'<h4> Klub játékosai</h4><br>';
    echo '<table class="table table-striped table-hover table-responsive"><thead><tr>';
    echo'<th scope="col1"> Mezszám </th><th scope="col1"> Vezetéknév </th><th scope="col1"> Keresztnév </th><th scope="col1"> Érték (tEUR) </th><th scope="col1"> Poszt </th><th scope="col1"> Születési idő </th><th scope="col1"> Nemzetiség </th></tr></thead>';
    foreach ($jatekosok->jatekosok as $jatekos) {

        echo '<tr><th scope="row">'.$jatekos['mezszam'].'</th><td> '. $jatekos['vezeteknev'] . '</td> <td> ' . $jatekos['utonev'] . ' </td>
               <td>  ' . $jatekos['ertek'] . '</td><td>  ' . $jatekos['posztnev'] . '</td><td>  ' . $jatekos['szulido'] . '</td>';
        if($jatekos['magyar']==0){
            echo"<td>Külföldi</td>";
        }else{
            echo"<td>Magyar</td>";
        }
        echo'</tr>';
    }
    echo '</table>';
}
?>


