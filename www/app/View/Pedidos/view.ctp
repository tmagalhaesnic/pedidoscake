<h1>Pedidos</h1>
<a href='/pedidos/index'>Voltar</a>
<table>
    <tr>
        <th>Id</th>
        <th>Cliente</th>
        <th>Data</th>
        <th>Observação</th>
        <th>Telefone</th>
    </tr>

    <?php foreach ($detalhes as $detalhe) : ?>
        <tr>
            <td><?php echo $detalhe['pedidos']['id_pedido']; ?></td>
            <td><?php echo $detalhe['clientes']['cliente_nome']; ?></td>
            <td><?php echo $detalhe['pedidos']['pedido_data']; ?></td> 
            <td><?php echo $detalhe['pedidos']['observacao_pedido']; ?></td>
            <td><?php echo $detalhe['clientes']['cliente_telefone']; ?></td> 
            
        </tr>
    <?php endforeach; ?>
</table>
<br>
<br>
<table>
    <tr>
        <th>Produtos</th>
        <th>Descrição</th>
        <th>Quantitade</th>
        <th>Valor Unitário</th>
    </tr>
    <?php foreach ($produtos as $produto) : ?>
        <tr>
            <td><?php echo $produto['produtos']['nome_produto']; ?></td>
            <td><?php echo $produto['produtos']['descricao_produto']; ?></td>
            <td><?php echo $produto['produtos_pedidos']['quantidade_produto']; ?></td> 
            <td><?php echo $produto['produtos_pedidos']['unidade_produto']; ?></td> 
        </tr>
    <?php endforeach; ?>
</table>    
<a href='/pedidos/add'>Faça seu pedido</a>