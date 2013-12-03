<?php
class FUtente extends FDatabase{
    public function __construct() {
        $this->_table='utente';
        $this->_key='username';
        $this->_return_class='EUtente';
        USingleton::getInstance('FDatabase');
    }
    
public function getMediaGuidatore($username){
     $query="SELECT `num_voti`,`voto_totale` FROM `guidatore` WHERE `username_guidatore`='$username'";
     $this->query($query);
     $array=$this->getResultAssoc();
     $somma_media=0;
     $tot_viaggi=0;
     for( $i=0; $i<count($array); $i++){
            if(($array[$i]['num_voti'])!=0){
            $somma_media=$somma_media + $array[$i]['voto_totale']/$array[$i]['num_voti'];
            $tot_viaggi++;
            }
        }
     if (count($array)!=0 && $tot_viaggi !=0){
     $media_guidatore=$somma_media/$tot_viaggi;}
     else
      {$media_guidatore=0;}
     $dati= array( "$media_guidatore", "$tot_viaggi");
     return $dati;
 }

public function getMediaPasseggero($username){
     $query="SELECT AVG(`feedback_guid`)as 'media' FROM `passeggero` WHERE `username_passeggero`='$username'";
     $this->query($query);
     $array=$this->getResultAssoc();
     return $array[0]['media'];
}
 

}

?>

