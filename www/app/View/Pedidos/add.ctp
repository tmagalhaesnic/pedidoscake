<table>
<h1>Criar pedido</h1>
<a href='/pedidos/index'>Voltar</a>
</table>

<?php

echo $this->Form->create('Post');
echo $this->Form->select('Cliente', Hash::combine($clientes, '{n}.clientes.nome', '{n}.clientes.nome'),
    ['empty' => null, 'label' => 'Selecione o cliente'] 
);?>
<br>
<br>
<?php
echo $this->Form->select('Produtos', Hash::combine($produtos, '{n}.produtos.nome', '{n}.produtos.nome'),
    ['empty' => null, 'label' => 'Selecione o produto'] 
);
echo $this->Form->input('Observações', array('rows' => '3'));
echo $this->Form->end('Criar pedido');
?>
