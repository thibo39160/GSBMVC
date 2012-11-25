    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>  
        <ul id="menuList">
			<li >
				  Visiteur :<br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
			</li>
                        <?php
                        if($_SESSION['type']=='V')
                        {?>
                            <li class="smenu">
              <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
           </li>
           <li class="smenu">
              <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
           </li>
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
                        <?php }
            else { 
                    ?>
           <li class="smenu">
              <a href="index.php?uc=suivie&action=selectionVisiteur" title="Suivie fiches de frais ">Suivie fiches de frais</a>
           </li>
           <li class="smenu">
              <a href="index.php?uc=validation&action=validation" title="Validation fiche de frais">Validation des fiche de frais</a>         
           </li>
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
     
                 <?php }
                        ?>
           
         </ul>
        
    </div>
    