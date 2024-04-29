const title = document.querySelector('.title')
const leaf1 = document.querySelector('.leaf1')
const leaf2 = document.querySelector('.leaf2')
const bush2 = document.querySelector('.bush2')
const mount1 = document.querySelector('.mount1')
const mount2 = document.querySelector('.mount2')

document.addEventListener('scroll', function() {
    let value = window.scrollY
    // console.log(value)
    title.style.marginTop = value * 1.1 + 'px'

    leaf1.style.marginLeft = -value + 'px'
    leaf2.style.marginLeft = value + 'px'

    bush2.style.marginBottom = -value + 'px'

    mount1.style.marginBottom = -value * 1.1 + 'px'
    mount2.style.marginBottom = -value * 1.2 + 'px'
})

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

