<?php $this->layout('layout', ['title' => 'Le vrai classement du PSC5 *',
							   'subtitle' => '"Parce que les points administratifs c\'est pour les faibles...et ceux qui font leur licence à temps" ** ']) ?>

<?php $this->start('main_content') ?>

<div class="table-responsive">
  <table class="table table-hover table-striped">
      <thead>
      <tr>
        <th colspan="2">#</th>
        <th>Equipe</th>
        <th>Pts</th>
        <th>MJ</th>
        <th>V</th>
        <th>N</th>
        <th>D</th>
        <th>Diff</th>
        <th>Buts+</th>
        <th>Buts-</th>
      </tr>
    </thead>
    <tbody>

	   <?php foreach ($classementEquipes as $Equipe => $data): ?>

	      <tr class="<?php if ($data['Pos'] == 1) { echo 'success';}elseif ($data['Pos'] == 9) {echo 'danger';}elseif ($Equipe == 'PARIS SPORT CLUB 5') {echo 'info';} ?>">
         <td><?php echo $data['Pos']; ?></td>
          <td>                     
              (<?php echo $data['PosOfficiel']; ?>)   
              <?php if($data['Officiel'] === '+'){echo '<i class="fa fa-long-arrow-up" aria-hidden="true"></i>';}
                    elseif($data['Officiel'] === '-'){echo '<i class="fa fa-long-arrow-down" aria-hidden="true"></i>';}?>               
          </td>
	        <td><?php echo $Equipe; ?></td>
	        <td><?php echo $data['Pts']; ?>      (<?php echo $data['PtsOfficiel']; ?>)</td>
	        <td><?php echo $data['MJ']; ?></td>
	        <td><?php echo $data['V']; ?></td>
	        <td><?php echo $data['N']; ?></td>
	        <td><?php echo $data['D']; ?></td>
	        <td><?php echo $data['Diff']; ?></td>
	        <td><?php echo $data['Buts+']; ?></td>
	        <td><?php echo $data['Buts-']; ?></td> 
	      </tr>

	   <?php endforeach; ?>
    </tbody>   
  </table>
</div>

<div class="alert alert-success" role="alert">
<h5><b>INFORMATIONS:</b></h5>
  <p><i class="fa fa-star" aria-hidden="true"></i>  Modifications par rapport au classement officiel: </br>Les victoires et défaites administratives (20-PE) ne sont pas prises en compte, le vrai score de la rencontre y est substitué. </br>En revanche, les forfaits (20-FO) sont pris en compte de la même manière que sur le classement officiel. </p>
  <p><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>  Ce vrai classement ne doit pas nous servir d'excuse pour ne pas faire renouveller notre licence dès juillet :)</p></br>
<h5><b>CONDITIONS DE CALCUL:</b></h5>
  <p><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Victoire = 3pts, Nul = 2pts, Défaites = 1pts, FO = 0pts, PE = 0pts</p>
  <p><i class="fa fa-check-circle-o" aria-hidden="true"></i>  2ème critère : En cas d'égalité de points, ce sont les matchs particuliers entre les équipes concernés qui comptent.</p>
  <p><i class="fa fa-check-circle-o" aria-hidden="true"></i>  3ème critère : Si l'égalité persiste c'est la différence générale de buts qui sert de 3ème critère.</p>
</div>


<div><h2>La liste des matchs :</h2></div>





<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

  <?php foreach ($rencontresParJournee as $journee => $match): ?>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading<?php echo $journee;?>">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $journee;?>" aria-expanded="false" aria-controls="collapse<?php echo $journee;?>">
            <h3>Journée  <?php echo $journee;?></h3>
          </a>
        </h4>
      </div>
      <div id="collapse<?php echo $journee;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $journee;?>">
        <div class="panel-body">
          <div class="table-responsive">

            <table class="table table-hover table-striped">

                <thead>
                <tr>
                  <th>Domicile</th>
                  <th colspan="2" class="text-center">Score</th>
                  <th class="text-right">Exterieur</th>
                </tr>
              </thead>

              <tbody>
              <?php foreach ($match as $key => $value): ?>
                  <tr class="<?php if($value['Nom_equipe_1'] == 'PARIS SPORT CLUB 5' || $value['Nom_equipe_2'] == 'PARIS SPORT CLUB 5'){ echo 'info';} ?>">
                    <td><?php echo $value['Nom_equipe_1']; ?></td>
                    <td class="text-right"><?php echo $value['Score_equipe_1']; ?></td>
                    <td class="text-left"><?php echo $value['Score_equipe_2']; ?></td>
                    <td class="text-right"><?php echo $value['Nom_equipe_2']; ?></td>
                  </tr>
               
              <?php endforeach; ?>
              </tbody> 
                
            </table>

          </div><!-- end TableResponsive -->
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>


<div class="row">
  <div class="col-md-6">
    <div><h2>Meilleure attaque:</h2></div>
    <div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Equipe</th>
            <th class="text-right">Buts+/Match</th>
          </tr>
        </thead>
          <tbody>
            <?php $position = 1 ; ?>
            <?php foreach ($classementAtt as $key => $value): ?>
              <tr <?php if($key == 'PARIS SPORT CLUB 5'){ echo 'class="info"';} ?>>
                <td class="text-left"><?php echo $position; ?></td>
                <td><?php echo $key; ?></td>
                <td class="text-right"><?php echo $value; ?></td>
              </tr>
              <?php $position++ ; ?> 
            <?php endforeach; ?>
          </tbody> 
      </table>
    </div>
  </div>
  <div class="col-md-6">
    <div><h2>Meilleure défense:</h2></div>

    <div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Equipe</th>
            <th class="text-right">Buts-/Match</th>
          </tr>
        </thead>
          <tbody>
            <?php $position = 1 ; ?>
            <?php foreach ($classementDef as $key => $value): ?>
              <tr <?php if($key == 'PARIS SPORT CLUB 5'){ echo 'class="info"';} ?>>
                <td class="text-left"><?php echo $position; ?></td>
                <td><?php echo $key; ?></td>
                <td class="text-right"><?php echo $value; ?></td>
              </tr>
              <?php $position++ ; ?> 
            <?php endforeach; ?>         
          </tbody> 
      </table>
    </div>    
  </div>
</div>










  



















<?php $this->stop('main_content') ?>
