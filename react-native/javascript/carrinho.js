export class Carrinho {
  constructor(cliente) {
    this.cliente = cliente;
    this.itens = [];
  }

  addProduto(produto) {
    this.itens.push(produto);
  }

  calcularTotal() {
    let total = 0;
    for (let i in this.itens) {
      total += this.itens[i].preco;
    }

    return total;
  }

  exibirResumo() {
    console.log("Nome Cliente: " + this.cliente.nome);
    console.log("Idade: " + this.cliente.idade);
    /*
    for (let i in this.itens) {
      console.log(this.itens[i].nome + " - " + this.itens[i].preco);
    }
    */

    this.itens.map(function () {
      console.log(this.itens[i].nome + " - " + this.itens[i].preco);
    });

    console.log("Total: R$" + this.calcularTotal());
  }

  filtrarProduto(valorMin = 0, valorMax = 0) {
    let filtrados = this.itens.filter(function (item) {
      return item.preco >= valorMin && item.preco <= valorMax;
    });
    filtrados.map((item) => {
      console.log(item.nome + " - R$" + item.preco);
    });
  }
}
