<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Senac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="">
    <div class="container">
        <header>
            <div class="title">LIVRARIA SENAC</div>
            <div class="icon-cart">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1" />
                </svg>
                <span>0</span>
            </div>
        </header>
        <section id="menu" class="menu section">
            <!-- Section Title -->
            <div class=" section-title" data-aos="fade-up">
                <h2>Our Collection</h2>
                <p><span>Books School</span> <span class="description-title">Menu</span></p>
            </div><!-- End Section Title -->

            <div class="">
                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade active show" id="menu-starters" role="tabpanel">

                        <div class="tab-header text-center">
                            <p>Livros</p>
                            <h3>Categorias</h3>
                        </div>

                        <div class="listProduct row gy-5">

                        </div>
                    </div>

                </div>
            </div>

        </section>
    </div>
    <div class="cartTab">
        <h1>Carrinho</h1>
        <div class="listCart">
        </div>
        <div class="d-flex justify-content-between p-2">
            <span>Total</span><span>R$ <span class="totalPrice"></span></span>
        </div>
        <div class="btn" style="height: 60px;">
            <button class="close">FECHAR</button>
            <button class="checkOut">Finalizar</button>
        </div>
    </div>

    <script src="./js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>