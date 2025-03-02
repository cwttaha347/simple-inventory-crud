<?php
function route($page, $type)
{
    if (isset($_GET['page']) && $_GET['page'] === $page && isset($_GET['type']) && $_GET['type'] === $type) {
        return true;
    }
}
