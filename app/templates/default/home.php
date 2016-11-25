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

	      <tr class="<?php if ($data['Pos'] == 1) { echo 'success';}elseif ($data['Pos'] == 9) {echo 'danger';} ?>">
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
  <p>* Modifications par rapport au classement officiel: </br>Les victoires et défaites administratives (20-PE) ne sont pas prises en compte, le vrai score de la rencontre y est substitué. </br>En revanche, les forfaits (20-FO) sont pris en compte de la même manière que sur le classement officiel. </p>
  <p>** Ce vrai classement ne doit pas nous servir d'excuse pour ne pas faire renouveller notre licence dès juillet :)</p>
</div>

<div><h2>La liste des matchs :</h2></div>

<div class="table-responsive">
  <table class="table table-hover table-striped">
      <thead>
      <tr>
        <th>Journée</th>
        <th>Domicile</th>
        <th colspan="2" class="text-center">Score</th>
        <th class="text-right">Exterieur</th>
      </tr>
    </thead>
    <tbody>

     <?php foreach ($rencontresEquipes as $rencontres => $match): ?>

        <tr>
          <td>J<?php echo $match['Journee']; ?></td>
          <td><?php echo $match['Nom_equipe_1']; ?></td>
          <td class="text-right"><?php echo $match['Score_equipe_1']; ?></td>
          <td class="text-left"><?php echo $match['Score_equipe_2']; ?></td>
          <td class="text-right"><?php echo $match['Nom_equipe_2']; ?></td>
        </tr>

     <?php endforeach; ?>
    </tbody>   
  </table>
<?php $this->stop('main_content') ?>
