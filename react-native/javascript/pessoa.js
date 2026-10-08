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
        this.profissao,
    );
  }
}
