//Realiza a seleção de todos os checkbox
let checkIndex = document.querySelector('#checkIndex')
let checkBoxes = document.querySelectorAll('#check')

checkIndex.addEventListener('click', () => {
  
  if (checkIndex.checked){
    for(let current of document.querySelectorAll('#check')) {
      current.checked = true
    }
  } else {
    for(let current of document.querySelectorAll('#check')) {
      current.checked = false
    }
  }
})



//Abrem o PopUp
function abrirPopUp(){
  document.getElementById('popup').style.display = 'block';
  console.log();
}

function ampliarPopUp(){
  document.getElementById('popup').style.width = '99%';
  document.getElementById('popup').style.height = '98%';
}

function fecharPopUp(){
  document.getElementById('popup').style.display = 'none';
}

function diminuirPopUp(){
  document.getElementById('popup').style.width = '45%';
  document.getElementById('popup').style.height = '65%';
}






//Realiza a ordenação e paginação da tabela
//https://github.com/Mobius1/Vanilla-DataTables

var table = document.querySelector("#tabela");
var dataTable = new DataTable(table,{
  perPage:5,   

  labels: {
  placeholder: "Busca de produtos...",
  perPage: "{select}",
  noRows: "Nenhum produto encontrado",
  info: "{rows} resultados\n. Apresentando produtos de {start} à {end} (Página {page} de {pages})",
  }
    
});

