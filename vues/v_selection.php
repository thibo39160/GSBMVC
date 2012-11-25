 <div id="contenu">
      <h2>Liste des visiteurs ayant des fiches de frais validées et non remboursées</h2>
      <h3>Visiteur à sélectionner : </h3>
      <form action="index.php?uc=suivie&action=montantValidee" method="post">
      <div class="corpsForm">
          
         
            <p>
	 
        <label for="lstVisiteur" accesskey="n">Visiteur : </label>
        <select id="lstVisiteur" name="lstVisiteur" onchange='this.form.submit()'>
            <?php
			foreach ($lesvisiteurs as $unVisiteur)
			{
                                
				$Visiteur = $unVisiteur['id'];
                                $VisiteurNom = $unVisiteur['nom'];                               
                                
				if($Visiteur == $utilisateurASelectionner){
				?>
				<option selected value="<?php echo $Visiteur ?>"><?php echo  $Visiteur." ".$VisiteurNom ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $Visiteur ?>"><?php echo  $Visiteur." ".$VisiteurNom ?> </option>
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
                                $dateModif = $unMois['dateModif'];
                                $montantValide = $unMois['montantValide'];
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