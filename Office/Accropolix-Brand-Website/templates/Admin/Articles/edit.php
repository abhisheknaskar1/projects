<h1>Edit Article</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->control('image');
    echo $this->Form->control('title');
    echo $this->Form->control('category_id'); 
    echo $this->Form->control('action_url'); 
    // echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>