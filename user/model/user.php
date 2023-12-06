<?php
class user
{
    private ?int $id_user = null;
    private ?string  $cin = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string  $age = null;
    private ?string $sexe = null;
    private ?string  $telephone = null;
    private ?string $nationalite = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?string $role = null;
    private ?string $diplome = null;
    private ?string $specialite = null;
    private ?string $pays = null;
    private ?string $ville = null;
    private ?string $lieu_cabinet = null;
    private ?string $image = null;

    public function __construct($id_user = null, $c, $n, $p, $a, $s, $t, $na, $e, $pa, $r, $d, $sp, $py, $vi, $l, $photo_filename = null)
    {
        // ... autres attributs
        $this->image = $photo_filename;
        $this->id_user = $id_user;
        $this->cin =$c; 
        $this->nom = $n;
        $this->prenom = $p;
        $this->age =$a;
        $this->sexe = $s;
        $this->telephone =$t;
        $this->nationalite = $na;
        $this->email = $e;
        $this->password = $pa;
        $this->role = $r;
        $this->diplome = $d;
        $this->specialite = $sp;
        $this->pays = $py;
        $this->ville = $vi;
        $this->lieu_cabinet = $l;
   

    }
    public function getid_user()
    {
        return $this->id_user;
    }
    public function getcin()
    {
        return $this->cin;
    }
    public function setcin($cin)
    {
        $this->cin = $cin;

        return $this;
    }
    public function getnom()
    {
        return $this->nom;
    }
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    public function getprenom()
    {
        return $this->prenom;
    }
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
    public function getage()
    {
        return $this->age;
    }
    public function setage($age)
    {
        $this->age = $age;

        return $this;
    }
    public function getsexe()
    {
        return $this->sexe;
    }
    public function setsexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }
    public function gettelephone()
    {
        return $this->telephone;
    }
    public function settelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }
    public function getnationalite()
    {
        return $this->nationalite;
    }
    public function setnationalite($nationalite)
    {
        $this-> nationalite= $nationalite;

        return $this;
    }
   
    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function setpassword($password)
    {
        $this->password= $password;

        return $this;
    }
    public function getrole()
    {
        return $this->role;
    }
    public function setrole($role)
    {
        $this->role = $role;

        return $this;
    }
    public function getdiplome()
    {
        return $this->diplome;
    }
    public function setdiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }
    public function getspecialite()
    {
        return $this->specialite;
    }
    public function setspecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }
    public function getpays()
    {
        return $this->pays;
    }
    public function setpays($pays)
    {
        $this->pays = $pays;

        return $this;
    }
    public function getville()
    {
        return $this->ville;
    }
    public function setville($ville)
    {
        $this->ville = $ville;

        return $this;
    }
    public function getlieu_cabinet()
    {
        return $this->lieu_cabinet;
    }
    public function setlieu_cabinet($lieu_cabinet)
    {
        $this-> lieu_cabinet= $lieu_cabinet;

        return $this;
    }
    public function getimage()
    {
        return $this->image;
    }
    
    public function setimage($image)
    {
        $this->image = $image;
    
        return $this;
    }
    
   

}
