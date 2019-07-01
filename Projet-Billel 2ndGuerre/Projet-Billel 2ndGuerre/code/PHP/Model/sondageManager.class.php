<?php

class sondageManager
{
    
	static public function add(Sondage $Sondage)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�paration de la requ�te d'insertion.
		$q = $db->prepare('INSERT INTO sondage (descriptionSondage,noteSondage,idUtilisateur) VALUES(:descriptionSondage,:noteSondage,:idUtilisateur) ') ;
		
		// Assignation des valeurs pour le name, le pr�name.
		$q->bindValue(':descriptionSondage', $Sondage>getDescription());
		$q->bindValue(':noteSondage', $Sondage>getNoteSondage());
		$q->bindValue(':idUtilisateur', $Sondage>getIdUtilisateur());
		
		// Ex�cution de la requ�te.
		$q->execute();
    }
    static public function delete( $IdSondage)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type DELETE.
		$q = $db->prepare('DELETE FROM sondage WHERE idSondage = '.$IdSondage);
		$q->execute();
    }	
    
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet sondage.
				
		$q = $db->query('SELECT idSondage, descriptionSondage,noteSondage, idUtilisateur FROM sondage WHERE idSondage = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new sondage($donnees);
    }
    static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les sondages.
		
		$q = $db->query('SELECT idSondage, descriptionsondage,noteSondage,idUser ');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$sondage[] = new sondage($donnees);
		}
		
		return $sondage;
    }
}