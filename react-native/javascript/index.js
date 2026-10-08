import { Pessoa } from "./pessoa.js";

const prompt = require("prompt-sync")();

var nome = prompt("Digite um nome: ");
var idade = prompt("Digite sua idade: ");
var profissao = prompt("Digite sua profissão: ");

let pessoa1 = new Pessoa(nome, idade, profissao);

function verificarDeMaior() {
  if (idade > 18) {
    console.log("de maior");
  } else {
    console.log("de Menor");
  }
}
function chegarProfissao() {
  if (idade > 18 && profissao == "mecanico") {
    console.log("É uma boa profissão");
  } else {
    console.log("Não mora em Chapecó");
  }
}

pessoa1.apresentar();
verificarDeMaior();
chegarProfissao();
