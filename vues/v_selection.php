 <div id="contenu">
      <h2>Liste des visiteurs ayant des fiches de frais validées et non remboursées</h2>
      <h3>Visiteur à sélectionner : </h3>
      <form action="index.php?uc=suivie&action=montantValidee" method="post">
      <div class="corpsForm">
          
         
            <p>
	 
        <label for="lstVisiteur" accesskey="n">Visiteur : </label>
        <select id="lstVisiteur" name="lstVisiteur">
            <?php
			foreach ($lesvisiteurs as $unVisiteur)
			{
                                
				$VisiteurID = $unVisiteur['id'];
                                $VisiteurNom = $unVisiteur['nom'];                               
                                
				if($VisiteurID == $utilisateurASelectionner){
				?>
				<option selected value="<?php echo $VisiteurID ?>"><?php echo  $VisiteurID." ".$VisiteurNom ?> </option>
                                <?php
				}
				else{ ?>
				<option value="<?php echo $VisiteurID ?>"><?php echo  $VisiteurID." ".$VisiteurNom ?> </option>
                                <?php

				}
			
			}
           
		   ?>    
            
        </select>
        
      </p>         
        

            <p>
	 
        <label for="lstMois" accesskey="n">Mois : </label>
        <select id="lstMois" name="lstMois">
            <?php
			foreach ($lesMois as $unMois)
			{
                                $mois = $unMois['mois'];
				$numAnnee =  $unMois['numAnnee'];
				$numMois =  $unMois['numMois'];
				if($mois == $moisASelectionner){
				?>
				<option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
			
			}
           
		   ?>    
            
        </select>
      
            </p>
      
      
      
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>