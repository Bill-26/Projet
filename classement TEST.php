<!DOCTYPE html>
<html lang="fr">
  <meta charset="utf-8" />
  <title>Classement ChronoRallye</title>
  <link rel="stylesheet" href="styleChrono.css">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
      table {
          font-family: "Helvetica Neue", "Arial",  sans-serif;
          border-collapse: collapse;
          min-width: 500px;
          max-width: 1000px;
          width: auto;
          box-shadow: 0 5px 50px rgba(0,0,0,0.15);
          font-weight: 600;
          margin: 0 auto;
          border:1px solid #ddd;
        }

  </style>
                                         

  <head>
    <header>
      <center><p>Classement</p></center>
      <ul class="menu">
        <li>
          <a href="index.html" class="actif">Acceuil</a>
        </li>
        <li>
          <a href="pilotes.html">Pilotes</a>
        </li>
        <li>
          <a href="apropos.html">À propos</a>
        </li>
      </ul>
    </header>
  </head>
  <body>
    <div class="class-text">
      Classement ChronoRallye du / / à h m 
    </div>
  <main>  
    <div class="tab">
      <center>
        <?php
        $filename = "data.csv";
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
      
    <button class="csv">
               <h3>
                 PDF
               </h3>
            </button>
    <script src="pdf_css.js"></script>
  <main>  
  </body>
</html>
