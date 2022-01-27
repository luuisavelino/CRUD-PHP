<div id="popup" class="popup">
    <a onClick="fecharPopUp(); <?//unset($_SESSION['popUpProduto']);?>">
        <svg width="25" height="16" fill="#f00f0f" class="close" aria-label="Close">
            <circle cx="8" cy="8" r="8"/>
        </svg>
    </a>
    <a onClick="diminuirPopUp();">
        <svg width="25" height="16" fill="yellow" class="close" aria-label="Close"> 
            <circle cx="8" cy="8" r="8"/>
        </svg>
    </a>
        <a onClick="ampliarPopUp();">
        <svg width="25" height="16" fill="green" class="close" aria-label="Close">
            <circle cx="8" cy="8" r="8"/>
        </svg>
        </a>
    <br>

    <h1 text-align="center" class="text-light">HISTÓRICO DO PRODUTO</h1>
    <h1 text-align="center" class="text-light" id="produtoID"><? echo $_SESSION['popUpProduto'];?></h1>     

</div>

