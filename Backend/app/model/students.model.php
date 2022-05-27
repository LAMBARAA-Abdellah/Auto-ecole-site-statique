
<?php
class students
{
    private $db;


    public function __construct()
    {
        $this->db = new database();
    }


    public function addStudent($data)
    {
        $this->db->query('INSERT INTO candidat (nom_candidat,prenom_candidat,email,tel,cin,adresse,datNaissance,sexe,permis,total,avance,photo,id_utilisateur) VALUES (:nom_candidat , :prenom_candidat,:email,:tel,:cin,:adresse,:datNaissance,:sexe,:permis,:total,:avance,:photo,:id_utilisateur)');
        // $this->db->bind(':nom_candidat', $data['nom_candidat'],':prenom_condidat', $data['prenom_candidat'],':email', $data['email'],':tel', $data['tel'],':cin', $data['cin'],':adresse', $data['adresse'],':datNaissance', $data['datNaissance'],':sexe', $data['sexe'],':permis', $data['permis'], ':Total', $data['Total'],':avance', $data['avance'],':id_utilisateur', $data['id_utilisateur']);
        $this->db->bind(':nom_candidat', $data['nom_candidat']);
        $this->db->bind(':prenom_candidat', $data['prenom_candidat']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':tel', $data['tel']);
        $this->db->bind(':cin', $data['cin']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':datNaissance', $data['datNaissance']);
        $this->db->bind(':sexe', $data['sexe']);
        $this->db->bind(':permis', $data['permis']);
        $this->db->bind(':total', $data['total']);
        $this->db->bind(':avance', $data['avance']||0);
        $this->db->bind(':photo', $data['photo']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getStudents()
    {
        $this->db->query('SELECT * FROM candidat');
        // $results = $this->db->execute();
        $results = $this->db->fetchAll();
        return $results;
    }


    function deleteStudent($id)
    {
        $this->db->query('DELETE FROM candidat WHERE id_candidat = :id_candidat');
        $this->db->bind(':id_candidat', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //update candidat
    function updateStudent($data, $id)
    {
        $this->db->query('UPDATE candidat SET nom_candidat = :nom_candidat, prenom_condidat = :prenom_condidat, email = :email, tel = :tel, cin = :cin, adresse = :adresse, datNaissance = :datNaissance, sexe = :sexe, permis = :permis, Total = :Total, avance = :avance WHERE id_candidat = :id_candidat');
        $this->db->bind(':nom_candidat', $data[0]);
        $this->db->bind(':prenom_condidat', $data[1]);
        $this->db->bind(':email', $data[2]);
        $this->db->bind(':tel', $data[3]);
        $this->db->bind(':cin', $data[4]);
        $this->db->bind(':adresse', $data[5]);
        $this->db->bind(':datNaissance', $data[6]);
        $this->db->bind(':sexe', $data[7]);
        $this->db->bind(':permis', $data[8]);
        $this->db->bind(':Total', $data[9]);
        $this->db->bind(':avance', $data[10]);
        //$this->db->bind(':id_utilisateur', $data[11]);
        $this->db->bind(':id_candidat', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>