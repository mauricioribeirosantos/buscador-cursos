<?php

//chamando arquivo autoload da classe vendor
require 'vendor/autoload.php';

//instanciando a requisição do guzzle
use GuzzleHttp\Client;

use Symfony\Component\DomCrawler\Crawler;

//

//especificando namespace
$client = new \GuzzleHttp\Client();

//requisição para a variável $resposta
//aqui passamos o método, e a url que vai buscar
$resposta = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');

//aqui atribuimos o corpo a variável $html
$html = $resposta->getBody();

//criando o objeto da classe crawler
$crawler = new Crawler();
$crawler->addHtmlContent($html);

//isolando a  classe card-curso__nome em uma variável
//funciona como o document.querySelector do ecma
$cursos = $crawler->filter('span.card-curso__nome');

foreach ($cursos as $curso) {
	echo $curso->textContent . PHP_EOL . "<br>";
}