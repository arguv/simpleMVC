<h1>
<?php
    echo $this->name;
    foreach ($this->val as &$value) {
        echo $value.' ';
    }
?>
</h1>