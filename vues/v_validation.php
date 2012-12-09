 <div id="contenu">
      <h2>les Fiches de frais</h2>
      <h3>Mois et utilisateur à sélectionner : </h3>
      <form action="index.php?uc=validation&action=voirValidation" method="post">
      <div class="corpsForm">
         
      <p>
	<label for="lstUtilisateur" accesskey="n">Utilisateur : </label>
        <select id="lstUtilisateur" name="lstUtilisateur">
            <?php
			foreach ($UtilisateurAvalider as $unUtilisateur)
			{
			    $unUtili = $unUtilisateur['id'];
                            $unUtiliPrenom = $unUtilisateur['nom'];
				if($unUtili == $utilisateurAselectionner){
				?>
				<option selected value="<?php echo $unUtili; ?>"><?php echo  $unUtili." ".$unUtiliPrenom; ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $unUtili; ?>"><?php echo $unUtili." ".$unUtiliPrenom;; ?> </option>
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
            
			foreach ($MoisAvalider as $unMois)
			{
			    $mois = $unMois['mois'];
				$numAnnee =  $unMois['numAnnee'];
				$numMois =  $unMois['numMois'];
				if($mois == $moisASelectionner2){
				?>
				<option selected value="<?php echo $mois; ?>"><?php echo  $numMois."/".$numAnnee; ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $mois; ?>"><?php echo $numMois."/".$numAnnee; ?> </option>
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
      </p> 
      </div>
        
      </form>