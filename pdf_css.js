
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
        })
        
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
          
          