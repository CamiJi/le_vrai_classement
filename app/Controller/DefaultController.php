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

		//On trie selon le classement PTS puis DIFF
		// Obtient une liste de colonnes
		foreach ($classement as $key => $row) {
		    $Pts[$key]  = $row['Pts'];
		    $Diff[$key] = $row['Diff'];
		}
		// Trie les données par volume décroissant, edition croissant
		// Ajoute $classement en tant que dernier paramètre, pour trier par la clé commune
		array_multisort($Pts, SORT_DESC, $Diff, SORT_DESC, $classement);

		//On set le champ Position (Pos)
		$position = 1;
		foreach ($classement as $key => $value) {
			$classement[$key]['Pos'] = $position;
			$position++;
		}






		//GENERATION CLASSEMENT OFFICIEL
		foreach ($listeEquipes as $cleEquipe => $equipe) {
			$classementOfficiel[$equipe['Nom']] = ['Pos' => '',
										   'Pts' =>'0',
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

		//On trie selon le classement PTS puis DIFF
		// Obtient une liste de colonnes
		foreach ($classementOfficiel as $key => $row) {
		    $PtsOfficiel[$key]  = $row['Pts'];
		    $DiffOfficiel[$key] = $row['Diff'];
		}
		// Trie les données par volume décroissant, edition croissant
		// Ajoute $classementOfficiel en tant que dernier paramètre, pour trier par la clé commune
		array_multisort($PtsOfficiel, SORT_DESC, $DiffOfficiel, SORT_DESC, $classementOfficiel);

		//On set le champ Position (Pos)
		$position = 1;
		foreach ($classementOfficiel as $key => $value) {
			$classementOfficiel[$key]['Pos'] = $position;
			$position++;
		}




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


		// echo "<pre>";
		// print_r($classement);
		// echo "</pre>";
		// die();

		// On réaffiche notre page home en lui envoyant les données  des equipes choisit au hasard
		$this->show('default/home',['classementEquipes' => $classement,
									'rencontresEquipes' => $rencontresEquipes]);

	}
}