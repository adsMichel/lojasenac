# CRUD Loja Livros
Crud em MVC e PHP e JS

### Detalhes:

>Os livros devem contar com as seguintes informações:

1. Nome
2. Autor
3. Quantidade de Páginas
4. Preço (em reais, contando centavos)
5. Flag para livro ativo/inativo (não afetando na listagem, somente um valor para referência)
6. Data de inclusão/edição
7. Imagem

### Configuração

Dentro de app.js alterar o caminho do fetch() e colocar a URL de produtos.php, pode ser localhost/produtos.php etc.

const initApp = () => {
    fetch('http://lojasenac.test/view/produtos.php')
        .then(response => response.json())
        .then(data => {
            listProduct = data;
            addDataToHTML();

            // Recuperar carrinho da memoria
            if (localStorage.getItem('cart')) {
                carts = JSON.parse(localStorage.getItem('cart'));
                addCartToHTML();
            }
        })
}
