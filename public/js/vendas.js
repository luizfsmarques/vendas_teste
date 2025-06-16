let addProd = document.querySelector("#add-prod");
let ultimoItem = 1;

// Entrada das informações do produto
let produto = document.querySelector("#produto");
let qtdProduto = document.querySelector("#qtd-produto");
let valorUnitario = document.querySelector("#valor-unitario");
let subtotalProduto = document.querySelector("#subtotal-produto");
let adicaoProdutos = document.querySelector('#adicao-produtos');
let sequenciaProdutoBd = 0;

let totalPgmt = document.querySelector("#total-pgmt");
let valorTotal = 0;

function criarElementosAdicaoProdutos (codProd,nomeProd,qtd,valUnit,subtotal){
    
    // Container dos produtos adicionados
    let produtosAdicionados = document.createElement('div');
    produtosAdicionados.setAttribute('class','produtos-adicionados row');

    // Input da sequência do item
    let produtoItem = document.createElement('div');
    produtoItem.setAttribute('class','col-1');
    let inputItem = document.createElement('input');
    inputItem.setAttribute('readonly','');
    inputItem.setAttribute('type','text');
    inputItem.setAttribute('class','form-control');
    inputItem.value = ultimoItem;
    produtoItem.appendChild(inputItem);
    produtosAdicionados.appendChild(produtoItem);

    // Input do código do produto
    let produtoCodProd = document.createElement('div');
    produtoCodProd.setAttribute('class','col-1');
    let inputCodProd = document.createElement('input');
    inputCodProd.setAttribute('readonly','');
    inputCodProd.setAttribute('type','text');
    inputCodProd.setAttribute('name','produto_bd_'+sequenciaProdutoBd+'[produto]');
    inputCodProd.setAttribute('class','form-control');
    inputCodProd.value = codProd;
    produtoCodProd.appendChild(inputCodProd);
    produtosAdicionados.appendChild(produtoCodProd);

    // Input do nome do produto
    let produtoNome = document.createElement('div');
    produtoNome.setAttribute('class','col-2');
    let inputNome = document.createElement('input');
    inputNome.setAttribute('readonly','');
    inputNome.setAttribute('type','text');
    inputNome.setAttribute('class','form-control');
    inputNome.value = nomeProd;
    produtoNome.appendChild(inputNome);
    produtosAdicionados.appendChild(produtoNome);

    // Input da quantidade do produto
    let produtoQtd = document.createElement('div');
    produtoQtd.setAttribute('class','col-2');
    let inputQtd = document.createElement('input');
    inputQtd.setAttribute('type','text');
    inputQtd.setAttribute('name','produto_bd_'+sequenciaProdutoBd+'[qtd]');
    inputQtd.setAttribute('class','form-control atualizar-produto');
    inputQtd.value = qtd;
    produtoQtd.appendChild(inputQtd);
    produtosAdicionados.appendChild(produtoQtd);

    // Input do valor do produto
    let produtoValor = document.createElement('div');
    produtoValor.setAttribute('class','col-2');
    let inputValor = document.createElement('input');
    inputValor.setAttribute('type','text');
    inputValor.setAttribute('step','0.01');
    inputValor.setAttribute('name','produto_bd_'+sequenciaProdutoBd+'[valor]');
    inputValor.setAttribute('class','form-control atualizar-produto');
    inputValor.value = valUnit;
    produtoValor.appendChild(inputValor);
    produtosAdicionados.appendChild(produtoValor);

    // Input do subtotal do produto
    let produtoSubtotal = document.createElement('div');
    produtoSubtotal.setAttribute('class','col-2');
    let inputSubtotal = document.createElement('input');
    inputSubtotal.setAttribute('type','text');
    inputSubtotal.setAttribute('step','0.01');
    inputSubtotal.setAttribute('name','produto_bd_'+sequenciaProdutoBd+'[subtotal]');
    inputSubtotal.setAttribute('class','form-control atualizar-produto');
    inputSubtotal.value = subtotal;
    produtoSubtotal.appendChild(inputSubtotal);
    produtosAdicionados.appendChild(produtoSubtotal);

    // Botão excluir do produto
    let produtoBtn = document.createElement('div');
    produtoBtn.setAttribute('class','col-2');
    let ancoraProduto = document.createElement('a');
    ancoraProduto.setAttribute('class','btn btn-danger');
    ancoraProduto.innerText = 'Excluir';
    produtoBtn.appendChild(ancoraProduto);
    produtosAdicionados.appendChild(produtoBtn);

    // Adicionar todos os itens na tela
    adicaoProdutos.appendChild(produtosAdicionados);

    ultimoItem++;
    sequenciaProdutoBd++;
}

function calculaSubtotalProdutos (quantProd,valUnit){
    subtotalProduto.value = Number(quantProd)*Number(valUnit);
}

function calculaValorTotal (subtotal,action) {
    if(action==='add'){
        valorTotal += subtotal; 
        totalPgmt.value = valorTotal;
    }
    else{
        valorTotal -= subtotal; 
        totalPgmt.value = valorTotal;
    }
}

produto.addEventListener('change',()=>{

    let arrayProduto = produto.value.split("|");
    let valor = arrayProduto[2].trim();
    valor = valor.replace('R$',"");

    valorUnitario.value = Number(valor);

    calculaSubtotalProdutos(qtdProduto.value,valorUnitario.value);

});

qtdProduto.addEventListener('input', function(e){
    calculaSubtotalProdutos(qtdProduto.value,valorUnitario.value);
});

valorUnitario.addEventListener('input', function(e){
    calculaSubtotalProdutos(qtdProduto.value,valorUnitario.value);
});

addProd.addEventListener('click', function(){
    
    let arrayProduto = produto.value.split("|");
    let codProd = arrayProduto[0].trim();
    let nomeProd = arrayProduto[1].trim();

    if(
        codProd!="" && 
        nomeProd!="" &&
        Number(qtdProduto.value)!=0 &&
        Number(valorUnitario.value)!=0 && 
        Number(subtotalProduto.value)!=0
    ){
        criarElementosAdicaoProdutos(
            codProd,nomeProd,
            Number(qtdProduto.value),
            Number(valorUnitario.value),
            Number(subtotalProduto.value)
        );

        calculaValorTotal(Number(subtotalProduto.value),'add');

        produto.selectedIndex = 0;
        qtdProduto.value = '';
        valorUnitario.value = '';
        subtotalProduto.value = '';

        // Para poder pegar o evento da atualização de um produto
        let atualizarProduto = document.querySelectorAll('.atualizar-produto');

        for(let i=0; i<atualizarProduto.length;i++){
            atualizarProduto[i].addEventListener('input',(e)=>{
                console.log(e.target.name);

                let arrayAtualiza = e.target.name.split("[");
                let qtdAtualizaName = arrayAtualiza[0].trim()+'[qtd]';
                let valorAtualizaName = arrayAtualiza[0].trim()+'[valor]';
                let subtotalAtualizaName = arrayAtualiza[0].trim()+'[subtotal]';

                let qtdAtualizaInput = document.querySelector('input[name="'+qtdAtualizaName+'"]');
                let valorAtualizaInput = document.querySelector('input[name="'+valorAtualizaName+'"]');
                let subtotalAtualizaInput = document.querySelector('input[name="'+subtotalAtualizaName+'"]');

                let qtdAtualiza = Number(qtdAtualizaInput.value);
                let valorAtualiza = Number(valorAtualizaInput.value);

                let antigoSubtotal = subtotalAtualizaInput.value;
                calculaValorTotal(Number(antigoSubtotal),'sub');

                let subtotalAtualiza = qtdAtualiza*valorAtualiza;
                calculaValorTotal(Number(subtotalAtualiza),'add');

                subtotalAtualizaInput.value = subtotalAtualiza;

            });
        }
        
    }

});


