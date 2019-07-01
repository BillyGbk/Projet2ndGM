<?php
class User
{	
    // on definit les attributs propre a la classe utilisateur
    private $_idImage;
    private $_urlDescription;
    private $_idUtilisateur;
//on met en place les getter et setter
    /**
     * Get the value of _idImage
     */ 
    public function getIdImage()
    {
        return $this->_idImage;
    }

    /**
     * Set the value of _idImage
     *
     * @return  self
     */ 
    public function setIdImage($_idImage)
    {
        $this->_idImage = $_idImage;

        return $this;
    }

    /**
     * Get the value of _urlDescription
     */ 
    public function getUrlDescription()
    {
        return $this->_urlDescription;
    }

    /**
     * Set the value of _urlDescription
     *
     * @return  self
     */ 
    public function setUrlDescription($_urlDescription)
    {
        $this->_urlDescription = $_urlDescription;

        return $this;
    }

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
//on met en place le construct et l hydrate
public function __construct(array $options = [])
if (!empty($options))
{
    $this->hydrate($options);
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
}
