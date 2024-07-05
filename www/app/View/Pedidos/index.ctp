<h1>Pedidos</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Cliente</th>
        <th>Data</th>
        <th>Telefone</th>
    </tr>

<?php foreach ($pedidos as $pedido): ?>
    
<tr>
    <td><?php echo $this -> Html -> link($pedido['pedidos']['id_pedido'], array('controller' => 'pedidos','action' => 'view', $pedido['pedidos']['id_pedido']));?></td>
    <td><?php echo $pedido['clientes']['cliente_nome']; ?></td>
    <td><?php echo $pedido['pedidos']['pedido_data']; ?></td> 
    <td><?php echo $pedido['clientes']['cliente_telefone']; ?></td> 
</tr>
<?php endforeach; ?>
</table>
<a href='/pedidos/add'>Faça seu pedido</a>

