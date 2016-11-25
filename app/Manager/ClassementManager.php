<?php 
namespace Manager;

class ClassementManager extends \W\Manager\Manager 
{

	public function listeEquipes(){

		$sql = "SELECT * FROM ". $this->table." ORDER BY Id";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function rencontresEquipes(){

		$sql = "SELECT rencontres.id, 
					   equipes1.Nom AS Nom_equipe_1, 
					   equipes2.Nom AS Nom_equipe_2, 
					   rencontres.Score_equipe_1, 
					   rencontres.Score_equipe_2 
					   FROM ". $this->table." 
					   LEFT JOIN (SELECT * FROM equipes)equipes1 ON equipes1.id = rencontres.Equipe_1 
					   LEFT JOIN (SELECT * FROM equipes)equipes2 ON equipes2.id = rencontres.Equipe_2";

		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function rencontresOfficielEquipes(){

		$sql = "SELECT rencontres.id, 
				equipes1.Nom AS Nom_equipe_1, 
				equipes2.Nom AS Nom_equipe_2, 
				IF(pe.Pe = 1, 'PE',IF(pe.Pe = 2, '20', rencontres.Score_equipe_1)) AS Score_equipe_1, 
				IF(pe.Pe = 2, 'PE',IF(pe.Pe = 1, '20',rencontres.Score_equipe_2)) AS Score_equipe_2 
				FROM ". $this->table." 
				LEFT JOIN (SELECT * FROM equipes)equipes1 ON equipes1.id = rencontres.Equipe_1 
				LEFT JOIN (SELECT * FROM equipes)equipes2 ON equipes2.id = rencontres.Equipe_2 
				LEFT JOIN pe ON pe.`Id_match` = rencontres.id";

		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}



}