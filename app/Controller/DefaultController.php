<?php

namespace Controller;

use \W\Controller\Controller;

use \Manager\ClassementManager;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		//On initie le tableau final
		$classement = [];
		
		// Je crée un gestionnaire dans le ClassementManager;
		$equipesManager = new ClassementManager();		
		// on va chercher les infos dans la table 'equipes' via le ClassementManager
		$equipesManager->setTable('equipes');
		// On cherche avec la méthode listeEquipe
		$listeEquipes = $equipesManager->listeEquipes();

		foreach ($listeEquipes as $cleEquipe => $equipe) {
			$classement[$equipe['Nom']] = [
										   'Pts' =>'0',
										   'Pos' => '',
										   'PosEgl' => '0',
										   'MJ' => '0',										  
										   'V' =>'0',
										   'D' =>'0',
										   'N' =>'0',
										   'Diff' => '',
										   'Buts+' =>'0',
										   'Buts-' =>'0',
										   'Officiel' => '',
										   'PosOfficiel' => '',
										   'PtsOfficiel' => ''];
		}




		// Je crée un gestionnaire dans le ClassementManager;
		$classementManager = new ClassementManager();		
		// on va chercher les infos dans la table 'equipes' via le ClassementManager
		$classementManager->setTable('rencontres');
		// On cherche avec la méthode listeEquipe
		$rencontresEquipes = $classementManager->rencontresEquipes();

		foreach ($rencontresEquipes as $idRencontres => $rencontres) {

			$id = $rencontres['id'];
			$Nom_equipe_1 = $rencontres['Nom_equipe_1'];
			$Nom_equipe_2 = $rencontres['Nom_equipe_2'];
			$Score_equipe_1 = $rencontres['Score_equipe_1'];
			$Score_equipe_2 = $rencontres['Score_equipe_2'];


			$classement[$Nom_equipe_1]['MJ']++;
			$classement[$Nom_equipe_2]['MJ']++;

			$classement[$Nom_equipe_1]['Buts+'] += $Score_equipe_1;
			$classement[$Nom_equipe_1]['Buts-'] += $Score_equipe_2;

			$classement[$Nom_equipe_2]['Buts+'] += $Score_equipe_2;
			$classement[$Nom_equipe_2]['Buts-'] += $Score_equipe_1;

			//Gestion des forfaits FO
			if ($Score_equipe_1 == 'FO') {
					$classement[$Nom_equipe_1]['D']++;
					$classement[$Nom_equipe_2]['V']++;

					$classement[$Nom_equipe_2]['Pts'] += 3;
			}
			elseif ($Score_equipe_2 == 'FO') {
					$classement[$Nom_equipe_1]['V']++;
					$classement[$Nom_equipe_2]['D']++;

					$classement[$Nom_equipe_1]['Pts'] += 3;
			}
			else{


				if ($Score_equipe_1 == $Score_equipe_2) {

					$classement[$Nom_equipe_1]['N']++;
					$classement[$Nom_equipe_2]['N']++;

					$classement[$Nom_equipe_1]['Pts'] += 2;
					$classement[$Nom_equipe_2]['Pts'] += 2;

				}
				elseif ($Score_equipe_1 > $Score_equipe_2) {


					$classement[$Nom_equipe_1]['V']++;
					$classement[$Nom_equipe_2]['D']++;

					$classement[$Nom_equipe_1]['Pts'] += 3;
					$classement[$Nom_equipe_2]['Pts'] += 1;	

					
				}
				elseif ($Score_equipe_1 < $Score_equipe_2) {

					$classement[$Nom_equipe_1]['D']++;
					$classement[$Nom_equipe_2]['V']++;

					$classement[$Nom_equipe_1]['Pts'] += 1;
					$classement[$Nom_equipe_2]['Pts'] += 3;	
				}
			}



		}

		//Calcul de la différence de buts
		foreach ($classement as $key => $value) {
			$classement[$key]['Diff'] = $classement[$key]['Buts+'] - $classement[$key]['Buts-'];

		}





		//PARTIE DIFFERENCE PARTICULIERE
		//Dans cette partie on cherche à savoir la différence particulière de points lors des cas d'égalité
		//On crée un tableau contenant les points présent sur plus d'une équipe
		$tableauPoints = [];
		foreach ($classement as $key => $value) {
			if (in_array($value['Pts'], $tableauPoints)) {
				$tableauPointsEgalite[] = $value['Pts'];
			}
			else{
				$tableauPoints[] = $value['Pts'];
			}
		}

		//On refait un tableau contenant les équipes à égalité triées par leur nb de points
		$tableauEquipesEgalite=[];
		$compteur = 1;
		foreach ($classement as $key => $value) {
			if (in_array($value['Pts'], $tableauPointsEgalite)) {
				$tableauEquipesEgalite[$value['Pts']][] = $key;
				$compteur++;
			}
		}

		//Si des cas d'égalité de points:
		if (!empty($tableauEquipesEgalite)) {

			foreach ($tableauEquipesEgalite as $nbPoints => $nomEquipesMC) {

				$classementMC = [];
				//MC = mini championnat
				$unMatchJoue = false;

				foreach ($nomEquipesMC as $cleEquipe => $equipe) {

					$classementMC[$equipe] = [
												   'Pts' =>'0',
												   'Pos' => '',
												   'PosEgl' => '',
												   'MJ' => '0',										  
												   'V' =>'0',
												   'D' =>'0',
												   'N' =>'0',
												   'Diff' => '',
												   'Buts+' =>'0',
												   'Buts-' =>'0',
												   'Officiel' => '',
												   'PosOfficiel' => '',
												   'PtsOfficiel' => ''];
				}


				foreach ($rencontresEquipes as $idRencontres => $rencontres) {

					

					$id = $rencontres['id'];
					$Nom_equipe_1 = $rencontres['Nom_equipe_1'];
					$Nom_equipe_2 = $rencontres['Nom_equipe_2'];
					$Score_equipe_1 = $rencontres['Score_equipe_1'];
					$Score_equipe_2 = $rencontres['Score_equipe_2'];

					if ((in_array($Nom_equipe_1, $nomEquipesMC)) && (in_array($Nom_equipe_2, $nomEquipesMC))) {

						$unMatchJoue = true;

						$classementMC[$Nom_equipe_1]['MJ']++;
						$classementMC[$Nom_equipe_2]['MJ']++;

						$classementMC[$Nom_equipe_1]['Buts+'] += $Score_equipe_1;
						$classementMC[$Nom_equipe_1]['Buts-'] += $Score_equipe_2;

						$classementMC[$Nom_equipe_2]['Buts+'] += $Score_equipe_2;
						$classementMC[$Nom_equipe_2]['Buts-'] += $Score_equipe_1;

						//Gestion des forfaits FO
						if ($Score_equipe_1 == 'FO') {
								$classementMC[$Nom_equipe_1]['D']++;
								$classementMC[$Nom_equipe_2]['V']++;

								$classementMC[$Nom_equipe_2]['Pts'] += 3;
						}
						elseif ($Score_equipe_2 == 'FO') {
								$classementMC[$Nom_equipe_1]['V']++;
								$classementMC[$Nom_equipe_2]['D']++;

								$classementMC[$Nom_equipe_1]['Pts'] += 3;
						}
						else{


							if ($Score_equipe_1 == $Score_equipe_2) {

								$classementMC[$Nom_equipe_1]['N']++;
								$classementMC[$Nom_equipe_2]['N']++;

								$classementMC[$Nom_equipe_1]['Pts'] += 2;
								$classementMC[$Nom_equipe_2]['Pts'] += 2;

							}
							elseif ($Score_equipe_1 > $Score_equipe_2) {


								$classementMC[$Nom_equipe_1]['V']++;
								$classementMC[$Nom_equipe_2]['D']++;

								$classementMC[$Nom_equipe_1]['Pts'] += 3;
								$classementMC[$Nom_equipe_2]['Pts'] += 1;	

								
							}
							elseif ($Score_equipe_1 < $Score_equipe_2) {

								$classementMC[$Nom_equipe_1]['D']++;
								$classementMC[$Nom_equipe_2]['V']++;

								$classementMC[$Nom_equipe_1]['Pts'] += 1;
								$classementMC[$Nom_equipe_2]['Pts'] += 3;	
							}
						}

					}

				}

				
				if ($unMatchJoue) {
									
					//Calcul de la différence de buts
					foreach ($classementMC as $key => $value) {
						$classementMC[$key]['Diff'] = $classementMC[$key]['Buts+'] - $classementMC[$key]['Buts-'];

					}

					//On trie selon le classement PTS puis DIFF
					// Obtient une liste de colonnes
					$PtsMC = [];
					$DiffMC = [];
					foreach ($classementMC as $key => $row) {
					    $PtsMC[$key]  = $row['Pts'];
					    $DiffMC[$key] = $row['Diff'];
					}
					array_multisort($PtsMC, SORT_DESC, $DiffMC, SORT_DESC, $classementMC);

					$position = 1;
					foreach ($classementMC as $key => $value) {
						$classementMC[$key]['Pos'] = $position;
						$classement[$key]['PosEgl'] = $position;
						$position++;
					}
				}
				
			}
		}



		//On trie selon le classement PTS puis DIFF
		// Obtient une liste de colonnes
		foreach ($classement as $key => $row) {
			$Pts[$key]    = $row['Pts'];
			$PosEgl[$key] = $row['PosEgl'];
			$Diff[$key]   = $row['Diff'];
		}

		// Trie les données par volume décroissant, edition croissant
		// Ajoute $classement en tant que dernier paramètre, pour trier par la clé commune
		array_multisort($Pts, SORT_DESC,  $PosEgl, SORT_ASC, $Diff, SORT_DESC, $classement);




		//On set le champ Position (Pos)
		$position = 1;
		foreach ($classement as $key => $value) {
			$classement[$key]['Pos'] = $position;
			$position++;
		}
 

		//=============================================================================================
		//=============================================================================================




		//GENERATION CLASSEMENT OFFICIEL
		foreach ($listeEquipes as $cleEquipe => $equipe) {
			$classementOfficiel[$equipe['Nom']] = ['Pos' => '',
										   'Pts' =>'0',
										   'PosEgl' => '0',
										   'MJ' => '0',										  
										   'V' =>'0',
										   'D' =>'0',
										   'N' =>'0',
										   'Diff' => '',
										   'Buts+' =>'0',
										   'Buts-' =>'0'];
		}

		//Ici on génère le classement officiel en tenant compte des rencontres PE
		$classementOfficielManager = new ClassementManager();		
		$classementOfficielManager->setTable('rencontres');
		$rencontresOfficielEquipes = $classementOfficielManager->rencontresOfficielEquipes();


		foreach ($rencontresOfficielEquipes as $idRencontres => $rencontres) {

			$id = $rencontres['id'];
			$Nom_equipe_1 = $rencontres['Nom_equipe_1'];
			$Nom_equipe_2 = $rencontres['Nom_equipe_2'];
			$Score_equipe_1 = $rencontres['Score_equipe_1'];
			$Score_equipe_2 = $rencontres['Score_equipe_2'];


			$classementOfficiel[$Nom_equipe_1]['MJ']++;
			$classementOfficiel[$Nom_equipe_2]['MJ']++;

			$classementOfficiel[$Nom_equipe_1]['Buts+'] += $Score_equipe_1;
			$classementOfficiel[$Nom_equipe_1]['Buts-'] += $Score_equipe_2;

			$classementOfficiel[$Nom_equipe_2]['Buts+'] += $Score_equipe_2;
			$classementOfficiel[$Nom_equipe_2]['Buts-'] += $Score_equipe_1;

			//Gestion des forfaits FO
			if ($Score_equipe_1 == 'FO') {
					$classementOfficiel[$Nom_equipe_1]['D']++;
					$classementOfficiel[$Nom_equipe_2]['V']++;

					$classementOfficiel[$Nom_equipe_2]['Pts'] += 3;
			}
			elseif ($Score_equipe_2 == 'FO') {
					$classementOfficiel[$Nom_equipe_1]['V']++;
					$classementOfficiel[$Nom_equipe_2]['D']++;

					$classementOfficiel[$Nom_equipe_1]['Pts'] += 3;
			}
			elseif($Score_equipe_1 == 'PE'){
					$classementOfficiel[$Nom_equipe_1]['D']++;
					$classementOfficiel[$Nom_equipe_2]['V']++;

					$classementOfficiel[$Nom_equipe_2]['Pts'] += 3;
			}
			elseif($Score_equipe_2 == 'PE'){
					$classementOfficiel[$Nom_equipe_1]['V']++;
					$classementOfficiel[$Nom_equipe_2]['D']++;

					$classementOfficiel[$Nom_equipe_1]['Pts'] += 3;
			}
			else{

				if ($Score_equipe_1 == $Score_equipe_2) {

					$classementOfficiel[$Nom_equipe_1]['N']++;
					$classementOfficiel[$Nom_equipe_2]['N']++;

					$classementOfficiel[$Nom_equipe_1]['Pts'] += 2;
					$classementOfficiel[$Nom_equipe_2]['Pts'] += 2;

				}
				elseif ($Score_equipe_1 > $Score_equipe_2) {


					$classementOfficiel[$Nom_equipe_1]['V']++;
					$classementOfficiel[$Nom_equipe_2]['D']++;

					$classementOfficiel[$Nom_equipe_1]['Pts'] += 3;
					$classementOfficiel[$Nom_equipe_2]['Pts'] += 1;	

					
				}
				elseif ($Score_equipe_1 < $Score_equipe_2) {

					$classementOfficiel[$Nom_equipe_1]['D']++;
					$classementOfficiel[$Nom_equipe_2]['V']++;

					$classementOfficiel[$Nom_equipe_1]['Pts'] += 1;
					$classementOfficiel[$Nom_equipe_2]['Pts'] += 3;	
				}
			}
		}

		//Calcul de la différence de buts
		foreach ($classementOfficiel as $key => $value) {
			$classementOfficiel[$key]['Diff'] = $classementOfficiel[$key]['Buts+'] - $classementOfficiel[$key]['Buts-'];

		}


		//=================================================================================================================
				//PARTIE DIFFERENCE PARTICULIERE
		//Dans cette partie on cherche à savoir la différence particulière de points lors des cas d'égalité
		//On crée un tableau contenant les points présent sur plus d'une équipe
		$tableauPointsOfficiel = [];
		foreach ($classementOfficiel as $key => $value) {
			if (in_array($value['Pts'], $tableauPointsOfficiel)) {
				$tableauPointsEgaliteOfficiel[] = $value['Pts'];
			}
			else{
				$tableauPointsOfficiel[] = $value['Pts'];
			}
		}



		//On refait un tableau contenant les équipes à égalité triées par leur nb de points
		$tableauEquipesEgaliteOfficiel=[];
		$compteur = 1;
		foreach ($classementOfficiel as $key => $value) {
			if (in_array($value['Pts'], $tableauPointsEgaliteOfficiel)) {
				$tableauEquipesEgaliteOfficiel[$value['Pts']][] = $key;
				$compteur++;
			}
		}


		//Si des cas d'égalité de points:
		if (!empty($tableauEquipesEgaliteOfficiel)) {

			foreach ($tableauEquipesEgaliteOfficiel as $nbPoints => $nomEquipesMCOfficiel) {
	


				$classementMCOfficiel = [];
				//MC = mini championnat
				$unMatchJoue = false;

				foreach ($nomEquipesMCOfficiel as $cleEquipe => $equipe) {

					$classementMCOfficiel[$equipe] = [
												   'Pts' =>'0',
												   'Pos' => '',
												   'PosEgl' => '',
												   'MJ' => '0',										  
												   'V' =>'0',
												   'D' =>'0',
												   'N' =>'0',
												   'Diff' => '',
												   'Buts+' =>'0',
												   'Buts-' =>'0',
												   'Officiel' => '',
												   'PosOfficiel' => '',
												   'PtsOfficiel' => ''];
				}


				foreach ($rencontresEquipes as $idRencontres => $rencontres) {


					$id = $rencontres['id'];
					$Nom_equipe_1 = $rencontres['Nom_equipe_1'];
					$Nom_equipe_2 = $rencontres['Nom_equipe_2'];
					$Score_equipe_1 = $rencontres['Score_equipe_1'];
					$Score_equipe_2 = $rencontres['Score_equipe_2'];

					if ((in_array($Nom_equipe_1, $nomEquipesMCOfficiel)) && (in_array($Nom_equipe_2, $nomEquipesMCOfficiel))) {


						$unMatchJoue = true;

						$classementMCOfficiel[$Nom_equipe_1]['MJ']++;
						$classementMCOfficiel[$Nom_equipe_2]['MJ']++;

						$classementMCOfficiel[$Nom_equipe_1]['Buts+'] += $Score_equipe_1;
						$classementMCOfficiel[$Nom_equipe_1]['Buts-'] += $Score_equipe_2;

						$classementMCOfficiel[$Nom_equipe_2]['Buts+'] += $Score_equipe_2;
						$classementMCOfficiel[$Nom_equipe_2]['Buts-'] += $Score_equipe_1;

						//Gestion des forfaits FO
						if ($Score_equipe_1 == 'FO') {
								$classementMCOfficiel[$Nom_equipe_1]['D']++;
								$classementMCOfficiel[$Nom_equipe_2]['V']++;

								$classementMCOfficiel[$Nom_equipe_2]['Pts'] += 3;
						}
						elseif ($Score_equipe_2 == 'FO') {
								$classementMCOfficiel[$Nom_equipe_1]['V']++;
								$classementMCOfficiel[$Nom_equipe_2]['D']++;

								$classementMCOfficiel[$Nom_equipe_1]['Pts'] += 3;
						}
						elseif($Score_equipe_1 == 'PE'){
								$classementOfficiel[$Nom_equipe_1]['D']++;
								$classementOfficiel[$Nom_equipe_2]['V']++;

								$classementOfficiel[$Nom_equipe_2]['Pts'] += 3;
						}
						elseif($Score_equipe_2 == 'PE'){
								$classementOfficiel[$Nom_equipe_1]['V']++;
								$classementOfficiel[$Nom_equipe_2]['D']++;

								$classementOfficiel[$Nom_equipe_1]['Pts'] += 3;
						}
						else{


							if ($Score_equipe_1 == $Score_equipe_2) {

								$classementMCOfficiel[$Nom_equipe_1]['N']++;
								$classementMCOfficiel[$Nom_equipe_2]['N']++;

								$classementMCOfficiel[$Nom_equipe_1]['Pts'] += 2;
								$classementMCOfficiel[$Nom_equipe_2]['Pts'] += 2;

							}
							elseif ($Score_equipe_1 > $Score_equipe_2) {


								$classementMCOfficiel[$Nom_equipe_1]['V']++;
								$classementMCOfficiel[$Nom_equipe_2]['D']++;

								$classementMCOfficiel[$Nom_equipe_1]['Pts'] += 3;
								$classementMCOfficiel[$Nom_equipe_2]['Pts'] += 1;	

								
							}
							elseif ($Score_equipe_1 < $Score_equipe_2) {

								$classementMCOfficiel[$Nom_equipe_1]['D']++;
								$classementMCOfficiel[$Nom_equipe_2]['V']++;

								$classementMCOfficiel[$Nom_equipe_1]['Pts'] += 1;
								$classementMCOfficiel[$Nom_equipe_2]['Pts'] += 3;	
							}
						}

					}

				}

				
				if ($unMatchJoue) {
									
					//Calcul de la différence de buts
					foreach ($classementMCOfficiel as $key => $value) {
						$classementMCOfficiel[$key]['Diff'] = $classementMCOfficiel[$key]['Buts+'] - $classementMCOfficiel[$key]['Buts-'];

					}

					//On trie selon le classement PTS puis DIFF
					// Obtient une liste de colonnes
					$PtsMCOfficiel = [];
					$DiffMCOfficiel = [];
					foreach ($classementMCOfficiel as $key => $row) {
					    $PtsMCOfficiel[$key]  = $row['Pts'];
					    $DiffMCOfficiel[$key] = $row['Diff'];
					}
					array_multisort($PtsMCOfficiel, SORT_DESC, $DiffMCOfficiel, SORT_DESC, $classementMCOfficiel);

					$position = 1;
					foreach ($classementMCOfficiel as $key => $value) {
						$classementMCOfficiel[$key]['Pos'] = $position;
						$classementOfficiel[$key]['PosEgl'] = $position;
						$position++;
					}
				}
				
			}
		}

		//On trie selon le classement PTS puis DIFF
		// Obtient une liste de colonnes
		foreach ($classementOfficiel as $key => $row) {
			$PtsOfficiel[$key]    = $row['Pts'];
			$PosEglOfficiel[$key] = $row['PosEgl'];
			$DiffOfficiel[$key]   = $row['Diff'];
		}


		// Trie les données par volume décroissant, edition croissant
		// Ajoute $classement en tant que dernier paramètre, pour trier par la clé commune
		array_multisort($PtsOfficiel, SORT_DESC,  $PosEglOfficiel, SORT_ASC, $DiffOfficiel, SORT_DESC, $classementOfficiel);


		//On set le champ Position (Pos)
		$position = 1;
		foreach ($classementOfficiel as $key => $value) {
			$classementOfficiel[$key]['Pos'] = $position;
			$position++;
		}


		//===================================================================================================================



		//COMPARAISON OFFICIEL ET VRAI CLASSEMENT
		//On compare les deux classements et selon la position on va remplir le champ Officiel avec + = ou -
		foreach ($listeEquipes as $cleEquipe => $equipe) {

			$Nom_equipe = $equipe['Nom'];

			$classement[$Nom_equipe]['PosOfficiel'] = $classementOfficiel[$Nom_equipe]['Pos'] ;			
			$classement[$Nom_equipe]['PtsOfficiel'] = $classementOfficiel[$Nom_equipe]['Pts'] ;			

			if ($classement[$Nom_equipe]['Pos'] > $classementOfficiel[$Nom_equipe]['Pos']) {
				$classement[$Nom_equipe]['Officiel'] = '-';
			}
			elseif ($classement[$Nom_equipe]['Pos'] < $classementOfficiel[$Nom_equipe]['Pos']) {
				$classement[$Nom_equipe]['Officiel'] = '+';
			}
			else{
				$classement[$Nom_equipe]['Officiel'] = '=';
			}
		}


		//On créer un tableau des rencontres trier par une clé Journée
		$listeRencontresParJournee = [];

		foreach ($rencontresEquipes as $key => $value) {

			$id = $value['id'];
			$Journee = $value['Journee'];

			$listeRencontresParJournee[$Journee][$id] = $value;
			// echo $journee;
		}	


		//===================================================================================================================

		//Calcul du classement de la meilleure attaque et du classement de la meilleure défense
		//On récupère la variable classement et on calcul pour chaque équipe le nb de but+ et - divisé par le nb de matchs jouées MJ

		foreach ($classement as $key => $value) {
			$classementAtt[$key] = round($value['Buts+']/$value['MJ'], 2);
			$classementDef[$key] = round($value['Buts-']/$value['MJ'], 2);

		}

		arsort($classementAtt);
		asort($classementDef);


		//===================================================================================================================

		// On réaffiche notre page home en lui envoyant les données  des equipes choisit au hasard
		$this->show('default/home',['classementEquipes'    => $classement,
									'classementAtt' => $classementAtt,
									'classementDef' => $classementDef,
									'rencontresParJournee' => $listeRencontresParJournee,
									'rencontresEquipes'    => $rencontresEquipes]);

	}


}