<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div>
              <div class>
                <label for>Data da Venda</label>
                <input v-model="dataVenda" class="form-control" type="date" name id>
              </div>
              <label for>Escolha o Cliente</label>
              <select v-model="clienteEscolhido" class="form-control">
                <option
                  v-for="cliente in clientesArray"
                  :key="cliente.id"
                  :value="cliente"
                >{{cliente.nome}}</option>
              </select>
              <div class="col-md-8 m-2">
                <button type="button" @click="vendaFinal()" class="btn btn-success">Realizar Venda</button>
                <button
                  @click.prevent="cancelaCliente()"
                  type="button"
                  class="btn btn-danger"
                >Cancelar Venda</button>
              </div>
            </div>
            <pre>{{venda}}</pre>
          </div>
          <div class="col-md-6">
            <produtoComponent
              v-for="produto in produtosArray"
              :produto="produto"
              :key="produto.id"
              v-on:updateItem="updateVenda($event)"
            ></produtoComponent>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ProdutoComponent from "./ProdutoComponent";
export default {
  components: {
    produtoComponent: ProdutoComponent
  },
  props: {
    clientes: {
      type: Array
    },
    produtos: {
      type: Array
    }
  },
  data() {
    return {
      clientesArray: [],
      produtosArray: [],
      clienteEscolhido: {},
      dataVenda: {},
      itens: [],
      totalVenda: 0,
      venda: {}
    };
  },
  created() {
    this.swapArrays();
  },
  methods: {
    swapArrays() {
      this.clientesArray = this.clientes;
      this.produtosArray = this.produtos;
    },
    cancelaCliente() {
      location.reload();
    },
    updateVenda(event) {
      let vm = this;
      this.itens.push(event);
      vm.calculaTotalVenda(event.total);
    },
    calculaTotalVenda(total) {
      this.totalVenda = this.totalVenda + total;
    },
    vendaFinal() {
      this.venda = {
        cliente_id: this.clienteEscolhido.id,
        itens: this.itens,
        data_venda: this.dataVenda,
        total_venda: this.totalVenda
      };
      let h = new Headers();
      h.append("Content-Type", "application/json");
      let url = "/api/store";
      let fetchData = {
        method: "POST",
        body: JSON.stringify(this.venda),
        headers: h
      };
      fetch(url, fetchData)
        .then(res => res.json())
        .then(res => {
          alert(res);
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  mounted() {}
};
</script>
