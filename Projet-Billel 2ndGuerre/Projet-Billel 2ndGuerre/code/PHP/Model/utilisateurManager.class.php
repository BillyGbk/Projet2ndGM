
<?php

class utilisateurManager
{
	  
	static public function add(utilisateur $utilisateur)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�paration de la requ�te d'insertion.
		$q = $db->prepare('INSERT INTO utilisateur(name, pseudoUtilisateur, firstName, password, confirm, level ) VALUES(:name, :pseudoUtilisateur, :firstName, :password, :confirm, :level)');
		
		// Assignation des valeurs pour le name, le pr�name.
		$q->bindValue(':name', $utilisateur->getName());
		$q->bindValue(':pseudoUtilisateur', $utilisateur->getPseudo());
		$q->bindValue(':firstName', $utilisateur->getFirstname());
		$q->bindValue(':password', $utilisateur->getPassword());
		$q->bindValue(':confirm', $utilisateur->getConfirm());
        $q->bindValue(':level', $utilisateur->getLevel());
       
		
		// Ex�cution de la requ�te.
		$q->execute();
		$q->CloseCursor ();
	}
	
	static public function delete(utilisateur $utilisateur)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type DELETE.
		$db->query('DELETE FROM utilisateur WHERE idutilisateur = '.$utilisateur->getIdutilisateur());
	}
	
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet utilisateur.
		/*$id = (int) $id;*/
		
		$q = $db->query('SELECT idutilisateur, name, firstName, pseudo , password, level, idGroup  FROM utilisateur WHERE idutilisateur = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new utilisateur($donnees);
	}

	

	static public function getByPseudo($pseudo) {
		$db = DbConnect::getDb (); // Instance de PDO.
		// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
		$q = $db->prepare ( 'SELECT idUtilisateur , nom , pseudo, prenom , motDePasse,  dateDeNaissance , idTheme FROM utilisateur WHERE pseudo = :pseudo' );
		
		// Assignation des valeurs .
		$q->bindValue ( ':pseudo', $pseudo );
		$q->execute ();
		$donnees = $q->fetch ( PDO::FETCH_ASSOC );
		$q->CloseCursor ();
		if ($donnees == false) { // Si l'utilisateur n'existe pas, on renvoi un objet vide
			return new utilisateur ();
		} else {
			return new utilisateur ( $donnees );
		}
	}
	
	static public function update(utilisateur $utilisateur)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�pare une requ�te de type UPDATE.
		$q = $db->prepare('UPDATE utilisateur SET name=:name, firstName=:firstName ,pseudo=:pseudo, password=:password, level=:level WHERE idutilisateur ='.$_SESSION[id]);
		
		// Assignation des valeurs � la requ�te.
		$q->bindValue(':nom', $utilisateur->getNom());
		$q->bindValue(':prenom', $utilisateur->getPrenom());
		$q->bindValue(':pseudo', $utilisateur->getPseudo());
		$q->bindValue(':motDePasse', $utilisateur->getMotDePasse());
        $q->bindValue(':idTheme', $utilisateur->getTheme());
        $q->bindValue(':dateDeNaissance',$utilisateur->getDatedeNaissance());
        
		// Ex�cution de la requ�te.
		$res = $q->execute();
	}
    
}
?>

