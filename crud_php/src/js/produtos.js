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
  event.preventDefault()
  document.getElementById('pegaProdutoID').click();
  document.getElementById('popup').style.display = 'block';  

  console.log(document.getElementById('pegaProdutoID').value)

  
}

function ampliarPopUp(){
  document.getElementById('popup').style.width = '99%';
  document.getElementById('popup').style.height = '98%';
}

function fecharPopUp(){
  event.preventDefault()
  document.getElementById('popup').style.display = 'none';
}

function diminuirPopUp(){
  document.getElementById('popup').style.width = '45%';
  document.getElementById('popup').style.height = '65%';
}



function teste(id){
  event.preventDefault()
  let formData = new FormData();
  formData.append("produtoID", id);
  let request = new DocumentHttpRequest();
  request.open("POST", "http://192.168.1.121/src/produtos/produtos.php", false);
  request.send(formData);
}

function pegaIdProduto(id){
  event.preventDefault()
  let url = "produtos.php";
  console.log(id)
  body = {
    "produtoID": id
}
  produtoPost(url, body)
}

function produtoPost(url, body) {
  console.log("Body=", body)
  let request = new XMLHttpRequest()
  request.open("POST", url, true)
  request.setRequestHeader("Content-type", "application/json")
  request.send(JSON.stringify(body))
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


