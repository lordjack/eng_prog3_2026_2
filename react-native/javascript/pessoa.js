export class Pessoa {
  constructor(nome, idade, profissao) {
    this.nome = nome;
    this.idade = idade;
    this.profissao = profissao;
  }

  apresentar() {
    console.log(
      "Olá, meu nome é " +
        this.nome +
        ", tenho " +
        this.idade +
        " anos sou profissional em " +
        this.profissao
    );
  }

  verificarDeMaior() {
    if (this.idade > 18) {
      console.log("de maior");
    } else {
      console.log("de Menor");
    }
  }
  chegarProfissao() {
    if (this.idade > 18 && this.profissao == "mecanico") {
      console.log(this.profissao + "É uma boa profissão ");
    } else {
      console.log("Não é Mecanico sua profissão é: " + this.profissao);
    }
  }
}
