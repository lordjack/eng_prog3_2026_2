import promptSync from "prompt-sync";
const prompt = promptSync();

import { Pessoa } from "./pessoa.js";
import { Produto } from "./produto.js";
import { Carrinho } from "./carrinho.js";

var nome = prompt("Digite um nome: ");
var idade = prompt("Digite sua idade: ");
var profissao = prompt("Digite sua profissão: ");

let pessoa1 = new Pessoa(nome, idade, profissao);

pessoa1.apresentar();
pessoa1.verificarDeMaior();
pessoa1.chegarProfissao();

let produto01 = new Produto("Bateria", 100, 12);
let produto02 = new Produto("Kit Vela", 120, 4);
let produto03 = new Produto("Filtro de Ar", 50, 3);
let produto04 = new Produto("Chocolate Meio Amargo", 9, 20);
let produto05 = new Produto("Chocolate Avelã", 8, 4);
let produto06 = new Produto("Chocolate ao Leite", 7, 25);

let carrinho01 = new Carrinho(pessoa1);

carrinho01.addProduto(produto01);
carrinho01.addProduto(produto02);
carrinho01.addProduto(produto03);
carrinho01.addProduto(produto04);
carrinho01.addProduto(produto05);
carrinho01.addProduto(produto06);

carrinho01.filtrarProduto(5, 10);

//carrinho01.exibirResumo();
//console.log(carrinho01.calcularTotal());
