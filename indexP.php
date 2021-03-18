<?php
require_once('connect.php');
$sql = "SELECT * FROM articles a
        INNER JOIN categorie c
        ON a.id_categorie = c.id
        ORDER BY id_a DESC";

$result = mysqli_query($conn, $sql);


function trDate($date){
    $dateArray = (explode("-",substr(($date),0,10)));
    $dateIns = $dateArray[2]."/".$dateArray[1]."/".$dateArray[0];
    return $dateIns;

}
function trH($h){
    $hArray = (explode(":",substr(($h),11,8)));
    $hIns = $hArray[0].":".$hArray[1].":".$hArray[2];
    return $hIns;

}
?>
<?php require_once('partials/header.inc');?>
<div class="container">
    <div class="text-center mt-5 mb-5">
        <h3>Les dernières actualités</h3>
    </div> 

    <div>
        <div class="row row-cols-1 row-cols-md-2  mt-1">
            <?php while($rows = mysqli_fetch_assoc($result)){ ?>
            <div class="col">
              <div class="card"  style="background-color: #f1f1f1;">
                <img src="assets/images/<?=$rows['image'];?>" class="card-img-top" alt="..." height="300">
                <div class="card-body">
                  <h5 class="card-title text-center"><?=$rows['titre'];?></h5>

                  <p class="card-text"><?=$rows['description'];?></p>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">Auteur: <?=$rows['auteur'];?></li>
                      <li class="list-group-item">Publié le: <?=trDate($rows['date_created']);?> à <?=trH($rows['date_created']); ?></li>
                      <li class="list-group-item">Catégorie: <?=$rows['nom'];?></li>
                 </ul>
                </div>
              </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php require_once('partials/footer.inc');?>
