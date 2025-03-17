<div class="books-container">
    <h1>Books Page</h1>
    <div class="content-container">
        <p>Esta es la página de libros. Aquí podrás encontrar todo nuestro catálogo de libros disponibles.</p>
        <a href="/" class="back-link">Regresar</a>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

    .books-container {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        color: #333;
        line-height: 1.6;
        min-height: 100vh;
        padding: 2rem;
        background-image: linear-gradient(135deg, #f5f7fa 0%, #e4eaec 100%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h1 {
        font-size: 3rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2rem;
        color: #2c3e50;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        padding-bottom: 0.5rem;
    }

    h1::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #4a6cf7, #6e8dfb);
        border-radius: 2px;
    }

    .content-container {
        max-width: 900px;
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .content-container:hover {
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .back-link {
        display: inline-block;
        text-decoration: none;
        color: #4a6cf7;
        font-weight: 600;
        font-size: 1.1rem;
        padding: 0.8rem 1.5rem;
        border-radius: 8px;
        border: 2px solid #4a6cf7;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }

    .back-link::before {
        content: "←";
        margin-right: 8px;
        transition: transform 0.3s;
    }

    .back-link:hover {
        background-color: rgba(74, 108, 247, 0.08);
        transform: translateY(-2px);
    }

    .back-link:hover::before {
        transform: translateX(-5px);
    }

    @media (max-width: 768px) {
        .books-container {
            padding: 1rem;
        }

        h1 {
            font-size: 2.2rem;
        }

        .content-container {
            padding: 1.5rem;
        }
    }
</style>
