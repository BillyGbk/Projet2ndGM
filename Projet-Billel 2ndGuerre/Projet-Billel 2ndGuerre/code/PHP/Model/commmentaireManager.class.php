<?php

class commentaireManager
{
	  
	static public function add(commentaire $commentaire)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�paration de la requ�te d'insertion.
        $q = $db->prepare('INSERT INTO Commentaire(description) VALUES('.$commentaire);
		// Ex�cution de la requ�te.
		$q->execute();
		$q->CloseCursor ();
    }
    static public function delete(commentaire $commentaire)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type DELETE.
		$db->query('DELETE FROM commentaire WHERE idcommentaire = '.$commentaire->getIdcommentaire());
    }
    
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet user.
		/*$id = (int) $id;*/
		
		$q = $db->query('SELECT idCommentaire, descriptionCommentaire,  FROM commentaire WHERE idCommentaire = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new commentaire($donnees);
	}
	static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les commentaires.
		
		$q = $db->query('SELECT idCommentaire, description FROM commentaire ORDER BY description');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$commentaire[] = new commentaire($donnees);
		}
		
		return $commentaire;
    }
    static public function update( $newcommentaire , $id )
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�pare une requ�te de type UPDATE.
		$q = $db->prepare('UPDATE commentaire SET description='.$newdescription.'  WHERE idCommentaire ='.$id);
		
		
		// Ex�cution de la requ�te.
		$res = $q->execute();
	}
	
	
}