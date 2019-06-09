<template>
  <div class="card text-white bg-dark mb-3 p-4">
    <h5>{{produto.produto_nome}}</h5>
    <p>Preço $ {{produto.preco_venda}}</p>
    <p class="float-left">Total {{total}}</p>
    <p>
      Quantidade:
      <input
        v-model="quantidade"
        class="form-control"
        type="number"
        :max="produto.estoques.quantidade_estoque"
      >
    </p>
    <button @click="somaTotal()">Adicionar</button>
  </div>
</template>
<script>
export default {
  props: {
    produto: {
      type: Object
    }
  },
  data() {
    return {
      total: 0,
      quantidade: 0
    };
  },
  methods: {
    somaTotal() {
      let vm = this;
      if (this.quantidade > this.produto.estoques.quantidade_estoque) {
        alert(
          "Você está ultrapassando a quantidade maxíma do estoque, não possuimos essa quantidade de produtos. Essa é a quantidade disponovel: " +
            this.produto.estoques.quantidade_estoque +
            " produtos"
        );
        this.total = 0;
      } else {
        this.total = this.produto.preco_venda * this.quantidade;
        vm.sendData(this.total);
      }
    },
    sendData(total) {
      let item = {
        produtoId: this.produto.id,
        total: total,
        quantidade: this.quantidade
      };
      this.$emit("updateItem", item);
    }
  }
};
</script>
