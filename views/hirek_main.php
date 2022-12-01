<h2>Hírek</h2>

<?php
 //var_dump($viewData);
 /*var_dump($viewData);
 echo '<br>';
 echo '<br>';
 var_dump($_POST);*/

// Hirek és a kommentek együtt összekapcsolva ---->

 foreach ($viewData['data'] as $data){

      echo  '<form action="hirek" method="post">
             <div class="card">';
      echo  '<div class="card mb-3">';
      echo  '<img src="./images/banner.jpg" class="card-img-top" alt="kép">';
      echo  '<div class="card-body">';
      echo  '<input class="form-control" style="display: none" name="hirid" value="'.$data['id'].'">';
      echo  '<h5 class="card-title">'.$data['cim'].'</h5>';
      echo  '<p class="card-text">'.$data['tartalom'].'</p>';
      echo  '<p class="card-text"><small class="text-muted fst-italic"> Szerző: '.$data['user_name'].' <br> Dátum: '.$data['hiridopont'].'</small></p></div></div>';
      // Comment szekció ----->

     foreach($viewData['komments']['kommentdata'] as $komment) {
        if($komment['hir_id']==$data['id']) {
             echo '<div class="card mb-2">';
             echo '<div class="card-body bg-light">
            <p class="card-text"> '. $komment['comment_tartalom'].'
            <p class="card-text"><small class="text-muted fst-italic">' . $komment['user_name'] . ' - ' . $komment['comment_idopont'] . ' </small></p>';
             echo '</p></div></div>';
         }
    }
      // Comment küldő form----->
      echo  '<div class="card-text p-2">
             <div class="form-floating">';
      echo  '<textarea class="form-control" name="kom" placeholder="Leave a comment here" required pattern="{1}"></textarea>
             <label for="floatingTextarea">Itt tudsz kommentálni</label>
             <br>';
      echo  '<input class="btn btn-success" type="submit" value="Komment hozzáadása">
             </div></div>';
      echo  '</form>';
      echo  '</div>';
      echo  '<br>';

 }

?>
