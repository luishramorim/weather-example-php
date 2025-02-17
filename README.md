<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <h1>Weather PHP</h1>
  <p>Este projeto foi desenvolvido utilizando <strong>Laravel</strong> e <strong>PHP</strong>, integrando a <strong>OpenWeather API</strong> para buscar os dados do clima atual.</p>
  
  <h2>Tecnologias Utilizadas</h2>
  <div>
    <span class="chip">Laravel 9.x</span>
    <span class="chip">PHP 8.x</span>
    <span class="chip">Tailwind CSS 3.x</span>
    <span class="chip">OpenWeather API</span>
  </div>

  <h2>Funcionalidades</h2>
  <ul>
    <li>Busca dos dados do clima atual para uma cidade especificada.</li>
    <li>Tratamento de erros nas requisições à API.</li>
    <li>Interface simples e minimalista utilizando Blade do Laravel.</li>
  </ul>

  <h2>Instalação e Configuração</h2>
  <ol>
    <li>Clone o repositório:
      <pre>git clone https://github.com/luishramorim/weather-example-php.git</pre>
    </li>
    <li>Acesse o diretório do projeto:
      <pre>cd weather-example-php</pre>
    </li>
    <li>Instale as dependências PHP com o Composer:
      <pre>composer install</pre>
    </li>
    <li>Copie o arquivo de exemplo de ambiente para criar o seu próprio <code>.env</code>:
      <pre>cp .env.example .env</pre>
    </li>
    <li>Gere a chave da aplicação:
      <pre>php artisan key:generate</pre>
    </li>
    <li>Abra o arquivo <code>.env</code> e insira sua chave da OpenWeather API:
      <pre>OPENWEATHER_API_KEY=seu_api_key_aqui</pre>
    </li>
  </ol>

  <h2>Como Executar a Aplicação</h2>
  <ol>
    <li>Inicie o servidor de desenvolvimento:
      <pre>php artisan serve</pre>
    </li>
    <li>Acesse a aplicação em seu navegador pelo endereço:
      <a href="http://127.0.0.1:8000/weather" target="_blank">http://127.0.0.1:8000/weather</a>
    </li>
    <li>Você pode passar o parâmetro <code>?city=NomeDaCidade</code> para buscar o clima de uma cidade específica.</li>
  </ol>

  <h2>Estrutura do Projeto</h2>
  <pre>
├── app
│   └── Http
│       └── Controllers
│           └── WeatherController.php
├── resources
│   └── views
│       └── weather.blade.php
├── .env
├── .env.example
├── composer.json
└── README.html   (este arquivo)
  </pre>

  <h2>Screenshot</h2>
  <p>Captura de tela:</p>
  <img src="https://github.com/user-attachments/assets/b64dd9af-f556-4df4-9d18-baed6e350e92" alt="Print da aplicação" class="screenshot">

  <h2>Contribuições</h2>
  <p>Se você tiver sugestões ou melhorias, sinta-se à vontade para abrir uma issue ou enviar um pull request.</p>

  <h2>Licença</h2>
  <p>Este projeto é open source e está disponível sob a licença <a href="LICENSE" target="_blank">MIT</a>.</p>
</body>
</html>
