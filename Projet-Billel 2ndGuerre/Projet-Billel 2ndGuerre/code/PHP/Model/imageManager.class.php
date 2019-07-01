<?php

class imageManager
{
	  
	static public function add(image $image)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�paration de la requ�te d'insertion.
		$q = $db->prepare('INSERT INTO image( idImage,source,idUtilisateur ) VALUES(:idImage,:source,:idUtilisateur)');
		
		// Assignation des valeurs pour le nom, le pr�nom.
		
		$q->bindValue(':idImage', $image->getidImage());
		$q->bindValue(':source', $image->getsource());
		$q->bindValue(':idUtilisateur', $image->getidUtilisateur());
		// Ex�cution de la requ�te.
		$q->execute();
		
	}
	
	static public function delete( $id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type DELETE.
		$db->query('DELETE FROM image WHERE idImage = '.$id);
	}
	
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Tache.
		$id = (int) $id;
		
		$q = $db->query('SELECT idImage,  idUtilisateur,source FROM image WHERE idImage = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new image($donnees);
	}
	
	static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les Tache.
		
		$q = $db->query('SELECT idImage, idUtilisateur,source FROM image ');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$image[] = new image($donnees);
		}
		
		return $image;
	}

	
	
	static public function update(image $image)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�pare une requ�te de type UPDATE.
		$q = $db->prepare('UPDATE image =:image, source=:source , idUtilisateur=:idUtilisateur, idImage=:image  WHERE idimage = :idimage');
		
		// Assignation des valeurs � la requ�te.
		$q->bindValue(':idimage', $image->getIdimage());
		$q->bindValue(':source', $image->getsource());
		$q->bindValue(':idutilisateur', $image->getIdUtilisateur());
		
	
		// Ex�cution de la requ�te.
		$res = $q->execute();
	}
}