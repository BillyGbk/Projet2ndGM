<?php

class User
{	
	// on definit les attribut propre a la classe utilisateur
	private $_idUtilisateur;
	private $_nom;
	private $_Prenom;
    private $_pseudo;
	private $_motDePasse;
	private $_confirm;
    private $_idTheme;
    private $_dateDeNaissance;

    //on met en place les getter et setter 

	/**
	 * Get the value of _idUtilisateur
	 */ 
	public function getIdUtilisateur()
	{
		return $this->_idUtilisateur;
	}

	/**
	 * Set the value of _idUtilisateur
	 *
	 * @return  self
	 */ 
	public function setIdUtilisateur($_idUtilisateur)
	{
		$this->_idUtilisateur = $_idUtilisateur;

		return $this;
	}

	/**
	 * Get the value of _nom
	 */ 
	public function getNom()
	{
		return $this->_nom;
	}

	/**
	 * Set the value of _nom
	 *
	 * @return  self
	 */ 
	public function setNom($_nom)
	{
		$this->_nom = $_nom;

		return $this;
	}

	/**
	 * Get the value of _Prenom
	 */ 
	public function getPrenom()
	{
		return $this->_Prenom;
	}

	/**
	 * Set the value of _Prenom
	 *
	 * @return  self
	 */ 
	public function setPrenom($_Prenom)
	{
		$this->_Prenom = $_Prenom;

		return $this;
	}

	/**
	 * Get the value of _motDePasse
	 */ 
	public function getMotDePasse()
	{
		return $this->_motDePasse;
	}

	/**
	 * Set the value of _motDePasse
	 *
	 * @return  self
	 */ 
	public function setMotDePasse($_motDePasse)
	{
		$this->_motDePasse = $_motDePasse;

		return $this;
	}

	/**
	 * Get the value of _confirm
	 */ 
	public function getConfirm()
	{
		return $this->_confirm;
	}

	/**
	 * Set the value of _confirm
	 *
	 * @return  self
	 */ 
	public function setConfirm($_confirm)
	{
		$this->_confirm = $_confirm;

		return $this;
	}

    /**
     * Get the value of _idTheme
     */ 
    public function getIdTheme()
    {
        return $this->_idTheme;
    }

    /**
     * Set the value of _idTheme
     *
     * @return  self
     */ 
    public function setIdTheme($_idTheme)
    {
        $this->_idTheme = $_idTheme;

        return $this;
    }

    /**
     * Get the value of _dateDeNaissance
     */ 
    public function getDateDeNaissance()
    {
        return $this->_dateDeNaissance;
    }

    /**
     * Set the value of _dateDeNaissance
     *
     * @return  self
     */ 
    public function setDateDeNaissance($_dateDeNaissance)
    {
        $this->_dateDeNaissance = $_dateDeNaissance;

        return $this;
    }

    /**
     * Get the value of _pseudo
     */ 
    public function getPseudo()
    {
        return $this->_pseudo;
    }

    /**
     * Set the value of _pseudo
     *
     * @return  self
     */ 
    public function setPseudo($_pseudo)
    {
        $this->_pseudo = $_pseudo;

        return $this;
    }

    //on met en place le construct et la fonction hydrate}  public function __construct(array $options = [])
  public function __construct(array $options = [])
    if (!empty($options))
    {
        $this->hydrate($options);
    }
}
public function hydrate($data)
{
    foreach ($data as $key => $value)
    {
        $method = 'set'.ucfirst($key);
        
        if (is_callable([$this, $method]))
        {
            $this->$method($value);
        }
    }
}

	