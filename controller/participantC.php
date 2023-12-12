<?php
include_once '../config.php';
include_once '../model/participantmodel.php';

class ParticipantC
{
    public function addParticipant($nomParticipant, $emailParticipant)
    {
        $sql = "INSERT INTO participants (nom_participant, email_participant) VALUES (:nom, :email)";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $nomParticipant,
                'email' => $emailParticipant,
            ]);

            return true;
        } catch (Exception $e) {
            return 'Erreur lors de l\'ajout du participant : ' . $e->getMessage();
        }
    }
}
?>
