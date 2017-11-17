
   

<div class="panel panel-indent" >
    <a href="http://www.recettes-asselin.com/bouchees.php"><h1>bouchées</h1></a>
      
      <ul style="list-style: none;">


            <?php include 'list-index.php';?>
            
            <br>
            <a class="button" data-open="commentsModal">Commentaires?</a>
            
            
      </ul>
      			  
</div>





  			  	


<div class="large reveal" id="commentsModal" data-reveal>
          <h1>Commentaires ou suggestions</h1>
          <p>Vous avez des commentaires, des suggestions ou même des erreurs? <br>Écrivez-nous</p>
          <?php include 'contact-form.php';?>
          
          
          
          <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
  </button>
</div>	