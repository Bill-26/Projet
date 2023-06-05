<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="viewport" content="width=device-width, minimum-scale=0.25"/>
    <meta name="viewport" content="width=device-width, maximum-scale=5.0"/>
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <meta http-equiv="refresh" content="15">
    <title>Classement ChronoRallye</title>
    <link rel="stylesheet" href="styleChrono.css">
    <style>
      table {
        font-family: "Helvetica Neue", "Arial", sans-serif;
        border-collapse: collapse;
        box-shadow: 0 5px 50px rgba(0,0,0,0.15);
        border:1px solid #ddd;
        margin-top:0%;
        overflow-y: auto; 
      }

    </style>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script src="https://unpkg.com/react/umd/react.development.js"></script>
        <script src="https://unpkg.com/react-dom/umd/react-dom.development.js"></script>
 

  </head>
  <body>
    <header>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>



<script>
const loaderContainer = document.querySelector('.loader-container');
window.addEventListener('load', () => {
  setTimeout(() => {
    loaderContainer.style.opacity = '0';
    loaderContainer.style.visibility = 'hidden';
  }, 1000);
});

</script>

      <center><p>Classement</p></center>
      <ul class="menu">
        <li>
          <a href="index.html" class="actif">Accueil</a>
        </li>
        <li>
          <a href="pilotes.html">Pilotes</a>
        </li>
        <li>
          <a href="apropos.html">À propos</a>
        </li>
      </ul>
    </header>

    <?php 
              $tab_data="data.csv";
    ?>

    <div class="class-text">
       <center>Classement ChronoRallye du / / à h m </center>
    </div>
    
    <div class="PM_button">
          <button class="général"><h3>Général</h3></button>
          <button class="PM1"><h3>PM1</h3></button>
          <button class="PM2"><h3>PM2</h3></button>
     </div>

  <button id="myButton" onclick= href='\classement.php?tab_data='data2.csv''>Cliquez-moi</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      
 
      <?php
      $nouvelle_valeur = isset($_POST['nouvelle_valeur']) ? $_POST['nouvelle_valeur'] : 'data.csv';// On récupère la nouvelle valeur saisie par l'utilisateur

      // On modifie la variable en conséquence
      $tab_data= $nouvelle_valeur;

      ?>

    <div class="tab">
      <center>
        <?php
        $filename = $tab_data;
        if (($handle = fopen($filename, "r")) !== FALSE) {
          echo "<table style='margin: 0 auto;'>\n";
          while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            echo "<tr>";
            foreach ($data as $value) {
              echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>\n";
          }
          echo "</table>\n";
          fclose($handle);
        }
        ?>
      </center>
    </div>
    
    <button class="download">
      <h3>
        PDF
      </h3>
    </button>
      
    <button class="csvButton" onclick="generateCSV()"><h3>CSV</h3></button>
    <button class="temps"><div id="countdown">15</div>


      <script>
          // Sélectionnez le bouton par sa classe
          var myButton = document.querySelector(".temps");

      // Ajoutez un gestionnaire d'événements onclick au bouton
            myButton.onclick = function() {
              location.reload();
            };
          var seconds = 15;
          var countdown = document.getElementById("countdown");

          var timer = setInterval(function() {
              if (seconds === 0) {
                  clearInterval(timer);
                  countdown.innerHTML = "";
              } else {
                  seconds--;
                  countdown.innerHTML =seconds;
                  countdown.className = "custom-content";
              }
          }, 1000);
      </script>
</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script>
      let div = document.querySelector(".tab");
      let btn = document.querySelector(".download");
      btn.addEventListener('click',()=>{
        html2pdf().from(div).set({
          margin: 0,
          filename: 'Classement.pdf',
          html2canvas: { scale: 5 },
          jsPDF: {orientation: 'landscape', unit: 'in', format: 'A4', compressPDF: true}
        }).save();
        setTimeout(() => {}, 5000);
      });
        function generateCSV() {
          var csv = [];
          var tr = document.querySelectorAll('tr');
          
          for (var i = 0; i < tr.length; i++) {
            var cols = tr[i].querySelectorAll('th,td');
            var csvRow = [];
            
            for (var j = 0; j < cols.length; j++) {
              csvRow.push(cols[j].innerHTML);
            }
            
            csv.push(csvRow.join(','));
          }
          
          var blob = new Blob([csv.join('\n')], { type: 'text/csv' });
          var downloadLink = document.createElement('a');
          downloadLink.href = URL.createObjectURL(blob);
          downloadLink.download = 'Classement ChronoRallye.csv';
          
          downloadLink.click();
        }
    </script>
<script type="text/babel" src="composant.jsx"></script>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = isset($_POST['action']) ? $_POST['action'] : '';

  if ($action === 'modifier_variable') {
    // Actions à effectuer lorsque l'action est "modifier_variable"
    
    // Exemple : Modifier une variable
    $tab_data = $_COOKIE['tab_data'];
    echo "Action déclenchée avec succès !";
    // Vous pouvez également effectuer d'autres actions PHP ici
  }
}
?>


  </body>
</html>