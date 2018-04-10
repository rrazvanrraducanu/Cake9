<h2>Move text</h2>
<?php
echo $this->Form->create();
echo $this->Form->input('text1', ['type'=>'text','value'=>$var1, 'style'=>'width:200px; height:30px;']);
echo $this->Form->button('->', ['type' => 'submit','name'=>'submit']);
echo $this->Form->input('text2',['type'=>'text','value'=>$var2, 'style'=>'width:200px; height:30px;']);


$options = array('upper' => 'Upper', 'lower' => 'Lower');
$attributes = array('legend' => false);
echo $this->Form->radio('letter', $options, $attributes);

echo $this->Form->end();
?>

