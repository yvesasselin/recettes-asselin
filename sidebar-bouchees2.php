
   

<div class="panel panel-indent" >
    <a href="http://www.recettes-asselin.com/bouchees.php"><h2>bouchées</h2></a>
      
      <ul style="list-style: none;">


            <?php include 'list-bouchees.php';?>
            
            <br>
            <a class="button" data-open="commentsModal">Commentaires?</a>
            
            
      </ul>
      			  
</div>





  			  	


<div class="reveal" id="commentsModal" data-reveal>
          <h1>Commentaires ou suggestions</h1>
          <p>Vous avez des commentaires, des suggestions ou même des erreurs? Écrivez nous</p>
          <?php include 'contact-form.php';?>
          
          
          
          <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
  </button>
</div>	