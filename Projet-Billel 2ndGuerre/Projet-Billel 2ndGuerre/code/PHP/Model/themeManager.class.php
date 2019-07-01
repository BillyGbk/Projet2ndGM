
<?php

class themeManager
{
	  
	static public function add(theme $theme)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�paration de la requ�te d'insertion.
		$q = $db->prepare('INSERT INTO theme( , idtheme, descriptionTheme, ) VALUES( :idtheme, :descriptionTheme, )');
		
		// Assignation des valeurs pour le nom, le pr�nom.
		
		$q->bindValue(':description', $theme->getDescription());
		$q->bindValue(':descriptionTheme', $theme->getdescriptionTheme());
		// Ex�cution de la requ�te.
		$q->execute();
		
	}
	
	static public function delete( $id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type DELETE.
		$db->query('DELETE FROM theme WHERE idtheme = '.$id);
	}
	
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Tache.
		$id = (int) $id;
		
		$q = $db->query('SELECT idtheme,  descriptionTheme,  date FROM theme WHERE idtheme = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new theme($donnees);
	}
	
	static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les Tache.
		
		$q = $db->query('SELECT idtheme,  descriptionTheme, FROM theme ORDER BY idtheme');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$taches[] = new theme($donnees);
		}
		
		return $taches;
    }
}