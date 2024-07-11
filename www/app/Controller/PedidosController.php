<?php 

class PedidosController extends AppController {
    public function index() {
        $this->set("pedidos", $this->Pedido->query("
        SELECT pedidos.id as id_pedido,
        pedidos.created as pedido_data,
        clientes.telefone as cliente_telefone,
        clientes.nome as cliente_nome FROM pedidos JOIN clientes ON pedidos.cliente_id = clientes.id"));
    }

    public function view($id = null) {
        $this->set("detalhes", $this->Pedido->query("
        SELECT pedidos.id as id_pedido,
        clientes.nome as cliente_nome,
        pedidos.created as pedido_data,
        clientes.telefone as cliente_telefone,
        pedidos.observacao as observacao_pedido FROM pedidos JOIN clientes ON pedidos.cliente_id = clientes.id WHERE pedidos.id = {$id}"));

        $this->set("produtos", $this->Pedido->query("
        SELECT produtos_pedidos.id as id_produtos_pedidos,
        produtos.id as id_produto,
        produtos.nome as nome_produto,
        produtos_pedidos.qt_produto as quantidade_produto,
        produtos_pedidos.vl_unitario as unidade_produto, 
        produtos.descricao as descricao_produto FROM pedidos JOIN produtos_pedidos ON pedidos.id = produtos_pedidos.pedido_id JOIN produtos ON produtos_pedidos.produto_id = produtos.id WHERE pedidos.id = {$id}"));

    }
    public function add(){
        $this->set("clientes", $this->Pedido->query("SELECT nome FROM clientes"));
        $this->set("produtos", $this->Pedido->query("SELECT nome FROM produtos"));

        if ($this->request->is('post')) {
            $data = $this->request->data;

            $clienteSelecionado = $data['Post']['Cliente'];
            $cliente = $this->Pedido->query("SELECT id FROM clientes WHERE nome = '{$clienteSelecionado}'");
            $clienteId = $cliente[0]['clientes']['id'];

            $observacoes = $data['Post']['Observações'];
            $dataCriacao = date('Y-m-d H:i:s');
            $dataModificacao = date('Y-m-d H:i:s');

            $query = "
                INSERT INTO pedidos (cliente_id, observacao, created, modified)
                VALUES ('{$clienteId}', '{$observacoes}', '{$dataCriacao}', '{$dataModificacao}')
            ";

            $insert = $this->Pedido->query($query);


            $this->Session->setFlash('Pedido criado com sucesso');
  
        }
    }

}