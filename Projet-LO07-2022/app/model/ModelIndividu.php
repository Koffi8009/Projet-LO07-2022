<!-- ----- debut ModelIndividu -->

<?php
require_once 'Model.php';

class ModelIndividu {
    private $famille_id, $id, $nom, $prenom, $sexe, $pere, $mere;
    
    public function __construct($famille_id=NULL, $id=NULL, $nom=NULL, $prenom=NULL, $sexe=NULL, $pere=NULL, $mere=NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($famille_id)) {
            $this->famille_id = $famille_id;
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->sexe = $sexe;
            $this->pere = $pere;
            $this->mere = $mere;
        }
    }
    
    public function getFamille_id() {
        return $this->famille_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getSexe() {
        return $this->sexe;
    }

    public function getPere() {
        return $this->pere;
    }

    public function getMere() {
        return $this->mere;
    }

    public function setFamille_id($famille_id){
        $this->famille_id = $famille_id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setSexe($sexe) {
        $this->sexe = $sexe;
    }

    public function setPere($pere) {
        $this->pere = $pere;
    }

    public function setMere($mere){
        $this->mere = $mere;
    }
    
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM `individu` WHERE id!=0 and famille_id=:famille_id";
            $statement = $database->prepare($query);
            $statement->execute(['famille_id' => $_SESSION['famille_id']]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function insert($nom, $prenom, $sexe) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from individu where famille_id=:famille_id";
            $statement = $database->prepare($query);
            $statement->execute(['famille_id' => $_SESSION['famille_id']]);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple individu
            $query = "insert into individu value (:famille_id, :id, :nom, :prenom, :sexe, 0, 0)";
            $statement = $database->prepare($query);
            $statement->execute([
                'famille_id' => $_SESSION['famille_id'],
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'sexe' => $sexe
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    public static function getInfos($id){
        try {
            // - Création du array de toutes les infos présentes dans l'affichage
            $infos = [];
            $database = Model::getInstance();
            
            //Récupération des infos de l'individu
            $query = "select * from individu where id=:id and famille_id=:famille_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'famille_id' => $_SESSION['famille_id']
            ]);
            $results = $statement->fetchAll();
            $infos['individu'] = $results[0];
            
            
             //Ajout des noms et prénoms des parents
            //Père :
            $query = "select nom,prenom from individu where id=:id and famille_id=:famille_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $infos['individu']['pere'],
                'famille_id' => $_SESSION['famille_id']
            ]);
            $results = $statement->fetchAll();
            $infos['individu']['pere_nom'] = $results[0]['nom'];
            $infos['individu']['pere_prenom'] = $results[0]['prenom'];
            //Mère :
            $query = "select nom,prenom from individu where id=:id and famille_id=:famille_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $infos['individu']['mere'],
                'famille_id' => $_SESSION['famille_id']
            ]);
            $results = $statement->fetchAll();
            $infos['individu']['mere_nom'] = $results[0]['nom'];
            $infos['individu']['mere_prenom'] = $results[0]['prenom'];
            
            
             //Récupération des évènement
            //Naissance 
            $query = "select event_date,event_lieu from evenement where event_type='NAISSANCE' and iid=:id and famille_id=:famille_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'famille_id' => $_SESSION['famille_id']
            ]);
            $results = $statement->fetchAll();
            if (empty($results[0]['event_date']))
                $infos['evenement']['NAISSANCE']['event_date'] = '?';
            else
                $infos['evenement']['NAISSANCE']['event_date'] = $results[0]['event_date'];
            if (empty($results[0]['event_lieu']))
                $infos['evenement']['NAISSANCE']['event_lieu'] = '?';
            else
                $infos['evenement']['NAISSANCE']['event_lieu'] = $results[0]['event_lieu'];
                
            //Déces
            $query = "select event_date,event_lieu from evenement where event_type='DECES' and iid=:id and famille_id=:famille_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'famille_id' => $_SESSION['famille_id']
            ]);
            $results = $statement->fetchAll();
            if (empty($results[0]['event_date']))
                $infos['evenement']['DECES']['event_date'] = '?';
            else
                $infos['evenement']['DECES']['event_date'] = $results[0]['event_date'];
            if (empty($results[0]['event_lieu']))
                $infos['evenement']['DECES']['event_lieu'] = '?';
            else
                $infos['evenement']['DECES']['event_lieu'] = $results[0]['event_lieu'];
            
            
            //Récupération des unions et des enfants
            $query = "SELECT iid1,iid2 from lien where (iid1=:id or iid2=:id) and famille_id=:famille_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'famille_id' => $_SESSION['famille_id']
            ]);
            $results = $statement->fetchAll();
            $infos['union'] = [];
            //Récupération des enfants
            $i=0;
            foreach ($results as $element) {
                $infos['union'][$i] = [];
                if ($element['iid1']==$id)
                    $infos['union'][$i]['id'] = $element['iid2'];
                else
                    $infos['union'][$i]['id'] = $element['iid1'];
                //Recherche du nom et prénom la personne de l'union
                $query = "select nom,prenom from individu where id=:id and famille_id=:famille_id";
                $statement = $database->prepare($query);
                $statement->execute([
                    'id' => $infos['union'][$i]['id'],
                    'famille_id' => $_SESSION['famille_id']
                ]);
                $results = $statement->fetchAll();
                $infos['union'][$i]['nom'] = $results[0]['nom'];
                $infos['union'][$i]['prenom'] = $results[0]['prenom'];
                
                //Recherche enfants
                $query = "select id,nom,prenom from individu where pere=:id and mere=:id2 and famille_id=:famille_id";
                $statement = $database->prepare($query);
                if ($infos['individu']['sexe']=='H'){
                    $statement->execute([
                    'id2' => $infos['union'][$i]['id'],
                    'id' => $id,
                    'famille_id' => $_SESSION['famille_id']
                ]);
                }else{
                    $statement->execute([
                    'id2' => $id,
                    'id' => $infos['union'][$i]['id'],
                    'famille_id' => $_SESSION['famille_id']
                ]);
                }
                $results = $statement->fetchAll();
                $infos['union'][$i]['enfants'] = $results;
                $i++;
            }
            
            
            
            return $infos;
        } catch (PDOException $e) {
            return -1;
        }
    }


}
