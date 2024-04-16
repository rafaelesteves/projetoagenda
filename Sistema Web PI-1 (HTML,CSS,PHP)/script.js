  // Função para fechar o aviso
function fecharAviso() {
  document.getElementById('aviso').style.display = 'none';
}

// Função para exibir o aviso
function exibirAviso() {
  document.getElementById('aviso').style.display = 'block';
}

// Selecione todos os itens do serviço
const servicoItems = document.querySelectorAll('.servico-item');
// Selecione o elemento para exibir o total
const totalElement = document.getElementById('total');

// Adicione um ouvinte de evento a cada item do serviço
servicoItems.forEach(item => {
    item.addEventListener('change', () => {
        let total = 0;

        // Percorra todos os itens de serviço
        servicoItems.forEach(servicoItem => {
            // Verifique se o serviço está selecionado
            if (servicoItem.querySelector('input[type="checkbox"]').checked) {
                // Obtenha o preço do serviço selecionado
                const preco = parseFloat(servicoItem.querySelector('.preco').getAttribute('data-preco'));
                // Adicione o preço ao total
                total += preco;
            }
        });

        // Exiba o total na tela
        totalElement.textContent = `Total: R$${total.toFixed(2)}`;
    });
});